<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMarcacionRequest;
use App\Http\Requests\UpdateMarcacionRequest;
use App\Repositories\MarcacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PasswordoEmpleado;
use App\Models\TpMarcacion;
use App\Models\Marcacion;
use App\Models\Empleado;
use App\Models\AutorizacionEmpleado;
use App\Models\Horario;
use Flash;
use Excel;
use DateTime;
use Response;

class MarcacionController extends AppBaseController
{
    /** @var  MarcacionRepository */
    private $marcacionRepository;

    public function __construct(MarcacionRepository $marcacionRepo)
    {
        $this->marcacionRepository = $marcacionRepo->with('empleado', 'tpMarcacion');
    }

    /**
     * Display a listing of the Marcacion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index( )
    {
      $tpempleado       =  Empleado::where('status', TRUE)
      ->select(DB::raw("UPPER(CONCAT(apellido,'  ', nombre)) AS name"), "empleados.id as id")
      ->orderBy('name',  'ASC')
      ->pluck( '(apellido||" " ||nombre)as name', 'empleados.id as id');

        $marcacions = $this->marcacionRepository
        ->with('empleado', 'tpMarcacion')
        ->all();

        return view('marcacions.index')
            ->with('marcacions', $marcacions)
            ->with('tpempleado', $tpempleado);

    }
    public function marcacionsMaps($long, $lat) {
      $long=$long; $lat=$lat;
      return view('marcacions.maps', compact('long','lat'));
    }
    public function report()
    {
      $tpempleado       =  Empleado::where('status', TRUE)
      ->select(DB::raw("UPPER(CONCAT(apellido,'  ', nombre)) AS name"), "empleados.id as id")
      ->orderBy('name',  'ASC')
      ->pluck( '(apellido||" " ||nombre)as name', 'empleados.id as id');

      return view('marcacions.report', compact('tpempleado'));
    }


    public function reportSearch()
    {
      $datos =[];
      $formulario    = request()->formulario;

      $marcacions  = (new Marcacion)->newQuery();
      $mes         = $formulario{'mes'};
      $year        = $formulario{'year'};
      $startDia    = '01';
      $endDia      =  strval(cal_days_in_month(CAL_GREGORIAN, $mes, $year));

      $startDate   = strtotime($year.'-'.$mes.'-01');
      $endDate     = strtotime($year.'-'.$mes.'-'.$endDia);
      $startDate   = date('Y-m-d',$startDate);
      $endDate     = date('Y-m-d',$endDate);

      if ($formulario{'id_empleado'}) {
        $marcacions  = $marcacions->where('id_empleado', $formulario{'id_empleado'});
      }

      $marcacions  = $marcacions->whereBetween('dia',[$startDate, $endDate] );
      $marcacions  = $marcacions->where('id_tp_marcacion','1');
      $marcacions  = $marcacions->with('empleado', 'tpMarcacion')->orderBy('dia', 'asc')->get();
      $i = 0;
      $total_positivo = 0;
      $total_negativo = 0;

      foreach ($marcacions as $key) {

        $dia_letra     =  $this->conocerDiaSemanaFecha($key->dia);
        $searchHorario = Horario::where('dia', $dia_letra)->first();
        $salidaQuery   = Marcacion::where('dia', $key->dia)
          ->where('id_tp_marcacion', 4)
          ->where('id_empleado', $key->id_empleado)
          ->first();

        $entrada       = $searchHorario->entrada;
        $salida        = $searchHorario->salida;

        $hora_inicio   = $key->hora_inicio;
        $hora_salida   = ($salidaQuery)? $salidaQuery->hora_inicio : null;

        //HORAS DE ENTRADA
        $resto_entrada  = $this->restoHoras($entrada, $hora_inicio, 'entrada', $key->id);

        $total_positivo = ($resto_entrada{'tp'} == 'suma' )? $total_positivo + $resto_entrada{'minutos'} : $total_positivo;

        $total_negativo = ($resto_entrada{'tp'} == 'resto' && $resto_entrada{'autorizado'} == null)?
        $total_negativo + $resto_entrada{'minutos'} : $total_negativo;
        //HORAS DE ENTRADA

        //HORAS DE SALIDA
        $resto_salida   = ($hora_salida != null ) ? $this->restoHoras($salida,  $hora_salida, 'salida', $salidaQuery->id) : null;

        $total_positivo = ($resto_salida!= null)?
        ($resto_salida{'tp'} == 'suma' )? $total_positivo + $resto_salida{'minutos'} : $total_positivo
        : $total_positivo;
        $total_negativo= ($resto_salida!= null)?
        ($resto_salida{'tp'} == 'resto' && $resto_salida{'autorizado'} == null)? $total_negativo + $resto_salida{'minutos'} : $total_negativo
        : $total_negativo;
        //HORAS DE SALIDA





        $dato = [
          'id'               => $key->id,
          'num'              => ++$i,
          'nombre'           => ($key->id_empleado) ? $key->empleado->nombre   : '-',
          'apellido'         => ($key->id_empleado) ? $key->empleado->apellido : '-',
          'dia_letra'        => $dia_letra,
          'fecha'            => date_format( $key->dia, 'd-m-Y'),
          'entrada'          => date("g:i a",strtotime($entrada)),
          'hora_inicio'      => date("g:i a",strtotime($hora_inicio)),
          'resto_entrada'    => $resto_entrada{'minutos'},
          'tp_resto_entrada' => $resto_entrada{'tp'},
          'salida'           => date("g:i a",strtotime($salida)),
          'hora_salida'      => ($hora_salida == null)? 'NO MARCO' : date("g:i a",strtotime($hora_salida)),
          'resto_salida'     => $resto_salida{'minutos'},
          'tp_resto_salida'  => $resto_salida{'tp'},
          'total_positivo'   => $total_positivo,
          'total_negativo'   => $total_negativo,
          'autorizado_salida'   => $resto_salida{'autorizado'},
          'autorizado_entrada'  => $resto_entrada{'autorizado'},
          'observacion_salida'  => $resto_salida{'observacion'},
          'observacion_entrada' => $resto_entrada{'observacion'},
        ];
        array_push($datos, $dato);

        $total_positivo = 0;
        $total_negativo = 0;
      }

      return response()->json(["data"=>$datos]);

    }


    function conocerDiaSemanaFecha($fecha)
    {
        $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
        $dia = $dias[date('w', strtotime($fecha))];
        return $dia;
    }


    function restoHoras($standar, $marco, $tp, $id)
    {
      $autorizado = null;
      $observacion = null;

      $queryAutorizacion = AutorizacionEmpleado::where('id_marcacion', $id)->with('aprobadoBy')->first();
      if($queryAutorizacion){
          $autorizado  = ($queryAutorizacion->aprobado_by)? mb_strtoupper($queryAutorizacion->aprobadoBy->usuario) : '-';
          $observacion = mb_strtoupper($queryAutorizacion->observacion);
      }
      $inicio;      $final;   $tp_cuenta;

      if ($tp == 'entrada'){
        $hora1 = strtotime( $standar);
        $hora2 = strtotime( $marco  );
        if( $hora1 < $hora2 ) {
          $inicio = $standar;
          $final  = $marco;
          $tp_cuenta ='resto';

        }else {
          $inicio = $marco;
          $final  = $standar;
          $tp_cuenta ='suma';
        }
      }

      if ($tp == 'salida'){
        $hora1 = strtotime( $standar);
        $hora2 = strtotime( $marco  );
        if( $hora1 > $hora2 ) {
          $inicio   = $marco;
          $final     = $standar;
          $tp_cuenta ='resto';
        }
        else {
          $inicio = $standar;
          $final  = $marco;
          $tp_cuenta ='suma';
        }
      }

      $horaInicio  = new DateTime($inicio);
      $horaTermino = new DateTime($final);

      $interval = $horaInicio->diff($horaTermino);


      $hora     = $interval->format('%H');
      $minutos  = $interval->format('%i');
      $total    = $minutos+($hora*60);

      return $dato =[
        'minutos' => $total,
        'tp'      => $tp_cuenta,
        'autorizado'  => $autorizado,
        'observacion' => $observacion,
      ];
    }

    function getRealIP(){

           if (isset($_SERVER["HTTP_CLIENT_IP"])){

               return $_SERVER["HTTP_CLIENT_IP"];

           }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

               return $_SERVER["HTTP_X_FORWARDED_FOR"];

           }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

               return $_SERVER["HTTP_X_FORWARDED"];

           }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

               return $_SERVER["HTTP_FORWARDED_FOR"];

           }elseif (isset($_SERVER["HTTP_FORWARDED"])){

               return $_SERVER["HTTP_FORWARDED"];

           }else{

               return $_SERVER["REMOTE_ADDR"];

           }
       }


    public function marcar()
    {

      $empleado       =  Empleado::where('status', TRUE)
      ->select(DB::raw("UPPER(CONCAT(apellido,'  ', nombre)) AS name"), "empleados.id as id")
      ->orderBy('name',  'ASC')
      ->pluck( '(apellido||" " ||nombre)as name', 'empleados.id as id');

      $tpmarcacion   = TpMarcacion::WHERE('status', '=', 'TRUE')->orderBy('id', 'ASC')->pluck('descripcion', 'id');

      return view('marcacions.marcar', compact('tpmarcacion', 'empleado'));
    }


    /**
     * Show the form for creating a new Marcacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('marcacions.create');
    }

    /**
     * Store a newly created Marcacion in storage.
     *
     * @param CreateMarcacionRequest $request
     *
     * @return Response
     */
    public function store()
    {

        $input       = request()->all();
        $password    = $input{'password'};
        $id_empleado = $input{'id_empleado'};
        $id_tp_marcacion = $input{'id_tp_marcacion'};
        $validPass       = PasswordoEmpleado::where('password', $password)->where('id_empleado',$id_empleado)->where('status', TRUE)->first();

        if (!$validPass) {
            Flash::error('Contraseña no valida!');
            return redirect(route('marcacions.marcar'));
        }
        $validDay      = Marcacion::where('dia', date("Y-m-d"))->where('id_tp_marcacion', $id_tp_marcacion)->where('id_empleado', $id_empleado)->first();

        if ($validDay) {
            Flash::error('Para este dia ya se realizo este tipo de marcacion!');
            return redirect(route('marcacions.marcar'));
        }else{
          $marcar =[
            'id_empleado'      => $input{'id_empleado'},
            'id_tp_marcacion'  => $input{'id_tp_marcacion'},
            'dia'              => date("Y-m-d"),
            'hora_inicio'      => date('H:i:s'),
            'observacion'      => $input{'observacion'},
            'latitud'          => $input{'latitud'},
            'longitud'         => $input{'longitud'},
            'ip_ubicacion'     => $this->getRealIP(),//$input{'longitud'},

          ];
          Marcacion::create($marcar);
          if($id_tp_marcacion > 1){
            $validDay      = Marcacion::where('dia', date("Y-m-d"))->where('id_tp_marcacion', '!=', $id_tp_marcacion)
            ->where('id_empleado', $id_empleado)
            ->orderBy('id_tp_marcacion', 'desc')->first();

            $fecha1 = \DateTime::createFromFormat('Y-m-d H:i:s',$validDay->created_at ); //new DateTime("2010-07-28 01:15:52");
            $fecha2 = new DateTime(now());
            $fecha    = $fecha1->diff($fecha2);
            $hora     = $fecha->format('%H');
            $minutos  = $fecha->format('%i');



            $validDay->hora_fin  = date('H:i:s');
            $validDay->total_min = $minutos+($hora*60);
            $validDay->update();
          }

          Flash::success('Marcacion guardada correctamente.');

          return redirect(route('marcacions.marcar'));
        }



    }

    /**
     * Display the specified Marcacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $marcacion = $this->marcacionRepository->find($id);

        if (empty($marcacion)) {
            Flash::error('Marcacion not found');

            return redirect(route('marcacions.index'));
        }

        return view('marcacions.show')->with('marcacion', $marcacion);
    }

    /**
     * Show the form for editing the specified Marcacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $marcacion = $this->marcacionRepository->find($id);

        if (empty($marcacion)) {
            Flash::error('Marcacion not found');

            return redirect(route('marcacions.index'));
        }

        return view('marcacions.edit')->with('marcacion', $marcacion);
    }

    /**
     * Update the specified Marcacion in storage.
     *
     * @param int $id
     * @param UpdateMarcacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarcacionRequest $request)
    {
        $marcacion = $this->marcacionRepository->find($id);

        if (empty($marcacion)) {
            Flash::error('Marcacion not found');

            return redirect(route('marcacions.index'));
        }

        $marcacion = $this->marcacionRepository->update($request->all(), $id);

        Flash::success('Marcacion updated successfully.');

        return redirect(route('marcacions.index'));
    }

    /**
     * Remove the specified Marcacion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $marcacion = $this->marcacionRepository->find($id);

        if (empty($marcacion)) {
            Flash::error('Marcacion not found');

            return redirect(route('marcacions.index'));
        }

        $this->marcacionRepository->delete($id);

        Flash::success('Marcacion deleted successfully.');

        return redirect(route('marcacions.index'));
    }
}
