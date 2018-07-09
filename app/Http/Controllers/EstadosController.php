<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstadosRequest;
use App\Http\Requests\UpdateEstadosRequest;
use App\Repositories\EstadosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstadosController extends AppBaseController
{
    /** @var  EstadosRepository */
    private $estadosRepository;

    public function __construct(EstadosRepository $estadosRepo)
    {
        $this->estadosRepository = $estadosRepo;
    }

    /**
     * Display a listing of the Estados.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadosRepository->pushCriteria(new RequestCriteria($request));
        $estados = $this->estadosRepository->all();

        return view('estados.index')
            ->with('estados', $estados);
    }

    /**
     * Show the form for creating a new Estados.
     *
     * @return Response
     */
    public function create()
    {
        return view('estados.create');
    }

    /**
     * Store a newly created Estados in storage.
     *
     * @param CreateEstadosRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadosRequest $request)
    {
        $input = $request->all();

        $estados = $this->estadosRepository->create($input);

        Flash::success('Estados Guardado exitosamente.');

        return redirect(route('estados.index'));
    }

    /**
     * Display the specified Estados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $id;
        $estados = $this->estadosRepository->findWithoutFail($id);

        if (empty($estados)) {
            Flash::error('Estados not found');

            return redirect(route('estados.index'));
        }

        return view('estados.show')->with('estados', $estados);
    }

    /**
     * Show the form for editing the specified Estados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estados = $this->estadosRepository->findWithoutFail($id);

        if (empty($estados)) {
            Flash::error('Estados not found');

            return redirect(route('estados.index'));
        }

        return view('estados.edit')->with('estados', $estados);
    }

    /**
     * Update the specified Estados in storage.
     *
     * @param  int              $id
     * @param UpdateEstadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadosRequest $request)
    {
        $estados = $this->estadosRepository->findWithoutFail($id);

        if (empty($estados)) {
            Flash::error('Estados not found');

            return redirect(route('estados.index'));
        }

        $estados = $this->estadosRepository->update($request->all(), $id);

        Flash::success('Estados Actualizado con exito.');

        return redirect(route('estados.index'));
    }

    /**
     * Remove the specified Estados from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estados = $this->estadosRepository->findWithoutFail($id);

        if (empty($estados)) {
            Flash::error('Estados not found');

            return redirect(route('estados.index'));
        }

        $this->estadosRepository->delete($id);

        Flash::success('Estados Borrado con exito.');

        return redirect(route('estados.index'));
    }
}
