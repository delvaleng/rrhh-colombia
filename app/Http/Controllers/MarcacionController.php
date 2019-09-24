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
use Flash;
use DateTime;
use Response;

class MarcacionController extends AppBaseController
{
    /** @var  MarcacionRepository */
    private $marcacionRepository;

    public function __construct(MarcacionRepository $marcacionRepo)
    {
        $this->marcacionRepository = $marcacionRepo;
    }

    /**
     * Display a listing of the Marcacion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $marcacions = $this->marcacionRepository
        ->with('empleado', 'tpMarcacion')
        ->all();

        return view('marcacions.index')
            ->with('marcacions', $marcacions);
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
    public function store(CreateMarcacionRequest $request)
    {
        $input       = $request->all();
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
          ];
          Marcacion::create($marcar);
          if($id_tp_marcacion > 1){
            $validDay      = Marcacion::where('dia', date("Y-m-d"))->where('id_tp_marcacion', $id_tp_marcacion-1)->where('id_empleado', $id_empleado)->first();

            $fecha1 = \DateTime::createFromFormat('Y-m-d H:i:s',$validDay->created_at ); //new DateTime("2010-07-28 01:15:52");
            $fecha2 = new DateTime(now());
            $fecha = $fecha1->diff($fecha2);
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
