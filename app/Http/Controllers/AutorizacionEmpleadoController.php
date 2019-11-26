<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAutorizacionEmpleadoRequest;
use App\Http\Requests\UpdateAutorizacionEmpleadoRequest;
use App\Repositories\AutorizacionEmpleadoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\AutorizacionEmpleado;
use Flash;
use Response;

class AutorizacionEmpleadoController extends AppBaseController
{
    /** @var  AutorizacionEmpleadoRepository */
    private $autorizacionEmpleadoRepository;

    public function __construct(AutorizacionEmpleadoRepository $autorizacionEmpleadoRepo)
    {
        $this->autorizacionEmpleadoRepository = $autorizacionEmpleadoRepo->with('creadoBy', 'aprobadoBy', 'marcacion');
    }

    /**
     * Display a listing of the AutorizacionEmpleado.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $autorizacionEmpleados = $this->autorizacionEmpleadoRepository->all();

        return view('autorizacion_empleados.index')
            ->with('autorizacionEmpleados', $autorizacionEmpleados);
    }

    /**
     * Show the form for creating a new AutorizacionEmpleado.
     *
     * @return Response
     */
    public function create()
    {
        return view('autorizacion_empleados.create');
    }

    /**
     * Store a newly created AutorizacionEmpleado in storage.
     *
     * @param CreateAutorizacionEmpleadoRequest $request
     *
     * @return Response
     */
    public function store(CreateAutorizacionEmpleadoRequest $request)
    {
        $input = $request->all();

        $autorizacionEmpleado = $this->autorizacionEmpleadoRepository->create($input);

        Flash::success('Autorizacion Empleado saved successfully.');

        return redirect(route('autorizacionEmpleados.index'));
    }

    public function searchAutorizacion()
    {
      $id_marcacion = request()->id_marcacion;
      $autorizacion = AutorizacionEmpleado::where('id_marcacion', $id_marcacion)->first();

      return response()->json(
        [ "data"   => $autorizacion,
          "object" => 'success'
        ]
      );
    }
    public function sendAutorizacion()
    {
      $formulario = request()->formulario;

      $data = [
        'id_marcacion'  => $formulario{'id_marcacion'},
        'creado_by'     => $formulario{'creado_by'},
        'aprobado_by'   => $formulario{'aprobado_by'},
        'observacion'   => $formulario{'observacion'},
      ];

      $autorizacion = AutorizacionEmpleado::where('id_marcacion', $formulario{'id_marcacion'})->first();
      if($autorizacion){
        $autorizacion->update($data);
      }else {
        AutorizacionEmpleado::create($data);
      }

      return response()->json(
        [ "object" => 'success'  ]
      );
    }

    /**
     * Display the specified AutorizacionEmpleado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $autorizacionEmpleado = $this->autorizacionEmpleadoRepository->find($id);

        if (empty($autorizacionEmpleado)) {
            Flash::error('Autorizacion Empleado not found');

            return redirect(route('autorizacionEmpleados.index'));
        }

        return view('autorizacion_empleados.show')->with('autorizacionEmpleado', $autorizacionEmpleado);
    }

    /**
     * Show the form for editing the specified AutorizacionEmpleado.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $autorizacionEmpleado = $this->autorizacionEmpleadoRepository->find($id);

        if (empty($autorizacionEmpleado)) {
            Flash::error('Autorizacion Empleado not found');

            return redirect(route('autorizacionEmpleados.index'));
        }

        return view('autorizacion_empleados.edit')->with('autorizacionEmpleado', $autorizacionEmpleado);
    }

    /**
     * Update the specified AutorizacionEmpleado in storage.
     *
     * @param int $id
     * @param UpdateAutorizacionEmpleadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAutorizacionEmpleadoRequest $request)
    {
        $autorizacionEmpleado = $this->autorizacionEmpleadoRepository->find($id);

        if (empty($autorizacionEmpleado)) {
            Flash::error('Autorizacion Empleado not found');

            return redirect(route('autorizacionEmpleados.index'));
        }

        $autorizacionEmpleado = $this->autorizacionEmpleadoRepository->update($request->all(), $id);

        Flash::success('Autorizacion Empleado updated successfully.');

        return redirect(route('autorizacionEmpleados.index'));
    }

    /**
     * Remove the specified AutorizacionEmpleado from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $autorizacionEmpleado = $this->autorizacionEmpleadoRepository->find($id);

        if (empty($autorizacionEmpleado)) {
            Flash::error('Autorizacion Empleado not found');

            return redirect(route('autorizacionEmpleados.index'));
        }

        $this->autorizacionEmpleadoRepository->delete($id);

        Flash::success('Autorizacion Empleado deleted successfully.');

        return redirect(route('autorizacionEmpleados.index'));
    }
}
