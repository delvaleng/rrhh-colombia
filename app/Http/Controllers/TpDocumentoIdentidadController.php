<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTpDocumentoIdentidadRequest;
use App\Http\Requests\UpdateTpDocumentoIdentidadRequest;
use App\Repositories\TpDocumentoIdentidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TpDocumentoIdentidadController extends AppBaseController
{
    /** @var  TpDocumentoIdentidadRepository */
    private $tpDocumentoIdentidadRepository;

    public function __construct(TpDocumentoIdentidadRepository $tpDocumentoIdentidadRepo)
    {
        $this->tpDocumentoIdentidadRepository = $tpDocumentoIdentidadRepo;
    }

    /**
     * Display a listing of the TpDocumentoIdentidad.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tpDocumentoIdentidads = $this->tpDocumentoIdentidadRepository->all();

        return view('tp_documento_identidads.index')
            ->with('tpDocumentoIdentidads', $tpDocumentoIdentidads);
    }

    /**
     * Show the form for creating a new TpDocumentoIdentidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('tp_documento_identidads.create');
    }

    /**
     * Store a newly created TpDocumentoIdentidad in storage.
     *
     * @param CreateTpDocumentoIdentidadRequest $request
     *
     * @return Response
     */
    public function store(CreateTpDocumentoIdentidadRequest $request)
    {
        $input = $request->all();

        $tpDocumentoIdentidad = $this->tpDocumentoIdentidadRepository->create($input);

        Flash::success('Tp Documento Identidad saved successfully.');

        return redirect(route('tpDocumentoIdentidads.index'));
    }

    /**
     * Display the specified TpDocumentoIdentidad.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tpDocumentoIdentidad = $this->tpDocumentoIdentidadRepository->find($id);

        if (empty($tpDocumentoIdentidad)) {
            Flash::error('Tp Documento Identidad not found');

            return redirect(route('tpDocumentoIdentidads.index'));
        }

        return view('tp_documento_identidads.show')->with('tpDocumentoIdentidad', $tpDocumentoIdentidad);
    }

    /**
     * Show the form for editing the specified TpDocumentoIdentidad.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tpDocumentoIdentidad = $this->tpDocumentoIdentidadRepository->find($id);

        if (empty($tpDocumentoIdentidad)) {
            Flash::error('Tp Documento Identidad not found');

            return redirect(route('tpDocumentoIdentidads.index'));
        }

        return view('tp_documento_identidads.edit')->with('tpDocumentoIdentidad', $tpDocumentoIdentidad);
    }

    /**
     * Update the specified TpDocumentoIdentidad in storage.
     *
     * @param int $id
     * @param UpdateTpDocumentoIdentidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTpDocumentoIdentidadRequest $request)
    {
        $tpDocumentoIdentidad = $this->tpDocumentoIdentidadRepository->find($id);

        if (empty($tpDocumentoIdentidad)) {
            Flash::error('Tp Documento Identidad not found');

            return redirect(route('tpDocumentoIdentidads.index'));
        }

        $tpDocumentoIdentidad = $this->tpDocumentoIdentidadRepository->update($request->all(), $id);

        Flash::success('Tp Documento Identidad updated successfully.');

        return redirect(route('tpDocumentoIdentidads.index'));
    }

    /**
     * Remove the specified TpDocumentoIdentidad from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tpDocumentoIdentidad = $this->tpDocumentoIdentidadRepository->find($id);

        if (empty($tpDocumentoIdentidad)) {
            Flash::error('Tp Documento Identidad not found');

            return redirect(route('tpDocumentoIdentidads.index'));
        }

        $this->tpDocumentoIdentidadRepository->delete($id);

        Flash::success('Tp Documento Identidad deleted successfully.');

        return redirect(route('tpDocumentoIdentidads.index'));
    }
}
