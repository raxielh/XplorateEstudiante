<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePosiblesRespuestasRequest;
use App\Http\Requests\UpdatePosiblesRespuestasRequest;
use App\Repositories\PosiblesRespuestasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PosiblesRespuestasController extends AppBaseController
{
    /** @var  PosiblesRespuestasRepository */
    private $posiblesRespuestasRepository;

    public function __construct(PosiblesRespuestasRepository $posiblesRespuestasRepo)
    {
        $this->posiblesRespuestasRepository = $posiblesRespuestasRepo;
    }

    /**
     * Display a listing of the PosiblesRespuestas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->posiblesRespuestasRepository->pushCriteria(new RequestCriteria($request));
        $posiblesRespuestas = $this->posiblesRespuestasRepository->all();

        return view('posibles_respuestas.index')
            ->with('posiblesRespuestas', $posiblesRespuestas);
    }

    /**
     * Show the form for creating a new PosiblesRespuestas.
     *
     * @return Response
     */
    public function create()
    {
        return view('posibles_respuestas.create');
    }

    /**
     * Store a newly created PosiblesRespuestas in storage.
     *
     * @param CreatePosiblesRespuestasRequest $request
     *
     * @return Response
     */
    public function store(CreatePosiblesRespuestasRequest $request)
    {
        $input = $request->all();

        $posiblesRespuestas = $this->posiblesRespuestasRepository->create($input);

        Flash::success('Posibles Respuestas Guardado exitosamente.');

        return back();
    }

    /**
     * Display the specified PosiblesRespuestas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $posiblesRespuestas = $this->posiblesRespuestasRepository->findWithoutFail($id);

        if (empty($posiblesRespuestas)) {
            Flash::error('Posibles Respuestas not found');

            return redirect(route('posiblesRespuestas.index'));
        }

        return view('posibles_respuestas.show')->with('posiblesRespuestas', $posiblesRespuestas);
    }

    /**
     * Show the form for editing the specified PosiblesRespuestas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $posiblesRespuestas = $this->posiblesRespuestasRepository->findWithoutFail($id);

        if (empty($posiblesRespuestas)) {
            Flash::error('Posibles Respuestas not found');

            return redirect(route('posiblesRespuestas.index'));
        }

        return view('posibles_respuestas.edit')->with('posiblesRespuestas', $posiblesRespuestas);
    }

    /**
     * Update the specified PosiblesRespuestas in storage.
     *
     * @param  int              $id
     * @param UpdatePosiblesRespuestasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePosiblesRespuestasRequest $request)
    {
        $posiblesRespuestas = $this->posiblesRespuestasRepository->findWithoutFail($id);

        if (empty($posiblesRespuestas)) {
            Flash::error('Posibles Respuestas not found');

            return redirect(route('posiblesRespuestas.index'));
        }

        $posiblesRespuestas = $this->posiblesRespuestasRepository->update($request->all(), $id);

        Flash::success('Posibles Respuestas Actualizado con exito.');

         return back();
    }

    /**
     * Remove the specified PosiblesRespuestas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $posiblesRespuestas = $this->posiblesRespuestasRepository->findWithoutFail($id);

        if (empty($posiblesRespuestas)) {
            Flash::error('Posibles Respuestas not found');

            return redirect(route('posiblesRespuestas.index'));
        }

        $this->posiblesRespuestasRepository->delete($id);

        Flash::success('Posibles Respuestas Borrado con exito.');

         return back();
    }
}
