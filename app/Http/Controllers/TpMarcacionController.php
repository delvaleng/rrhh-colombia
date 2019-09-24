<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTpMarcacionRequest;
use App\Http\Requests\UpdateTpMarcacionRequest;
use App\Repositories\TpMarcacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TpMarcacionController extends AppBaseController
{
    /** @var  TpMarcacionRepository */
    private $tpMarcacionRepository;

    public function __construct(TpMarcacionRepository $tpMarcacionRepo)
    {
        $this->tpMarcacionRepository = $tpMarcacionRepo;
    }

    /**
     * Display a listing of the TpMarcacion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tpMarcacions = $this->tpMarcacionRepository->all();

        return view('tp_marcacions.index')
            ->with('tpMarcacions', $tpMarcacions);
    }

    /**
     * Show the form for creating a new TpMarcacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('tp_marcacions.create');
    }

    /**
     * Store a newly created TpMarcacion in storage.
     *
     * @param CreateTpMarcacionRequest $request
     *
     * @return Response
     */
    public function store(CreateTpMarcacionRequest $request)
    {
        $input = $request->all();

        $tpMarcacion = $this->tpMarcacionRepository->create($input);

        Flash::success('Tp Marcacion saved successfully.');

        return redirect(route('tpMarcacions.index'));
    }

    /**
     * Display the specified TpMarcacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tpMarcacion = $this->tpMarcacionRepository->find($id);

        if (empty($tpMarcacion)) {
            Flash::error('Tp Marcacion not found');

            return redirect(route('tpMarcacions.index'));
        }

        return view('tp_marcacions.show')->with('tpMarcacion', $tpMarcacion);
    }

    /**
     * Show the form for editing the specified TpMarcacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tpMarcacion = $this->tpMarcacionRepository->find($id);

        if (empty($tpMarcacion)) {
            Flash::error('Tp Marcacion not found');

            return redirect(route('tpMarcacions.index'));
        }

        return view('tp_marcacions.edit')->with('tpMarcacion', $tpMarcacion);
    }

    /**
     * Update the specified TpMarcacion in storage.
     *
     * @param int $id
     * @param UpdateTpMarcacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTpMarcacionRequest $request)
    {
        $tpMarcacion = $this->tpMarcacionRepository->find($id);

        if (empty($tpMarcacion)) {
            Flash::error('Tp Marcacion not found');

            return redirect(route('tpMarcacions.index'));
        }

        $tpMarcacion = $this->tpMarcacionRepository->update($request->all(), $id);

        Flash::success('Tp Marcacion updated successfully.');

        return redirect(route('tpMarcacions.index'));
    }

    /**
     * Remove the specified TpMarcacion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tpMarcacion = $this->tpMarcacionRepository->find($id);

        if (empty($tpMarcacion)) {
            Flash::error('Tp Marcacion not found');

            return redirect(route('tpMarcacions.index'));
        }

        $this->tpMarcacionRepository->delete($id);

        Flash::success('Tp Marcacion deleted successfully.');

        return redirect(route('tpMarcacions.index'));
    }
}
