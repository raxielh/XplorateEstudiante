<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubtituloRequest;
use App\Http\Requests\UpdateSubtituloRequest;
use App\Repositories\SubtituloRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SubtituloController extends AppBaseController
{
    /** @var  SubtituloRepository */
    private $subtituloRepository;

    public function __construct(SubtituloRepository $subtituloRepo)
    {
        $this->subtituloRepository = $subtituloRepo;
    }

    /**
     * Display a listing of the Subtitulo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subtituloRepository->pushCriteria(new RequestCriteria($request));
        $subtitulos = $this->subtituloRepository->all();

        return view('subtitulos.index')
            ->with('subtitulos', $subtitulos);
    }

    /**
     * Show the form for creating a new Subtitulo.
     *
     * @return Response
     */
    public function create()
    {
        return view('subtitulos.create');
    }

    /**
     * Store a newly created Subtitulo in storage.
     *
     * @param CreateSubtituloRequest $request
     *
     * @return Response
     */
    public function store(CreateSubtituloRequest $request)
    {
        $input = $request->all();

        $subtitulo = $this->subtituloRepository->create($input);

        Flash::success('Subtitulo Guardado exitosamente.');

        return redirect(route('subtitulos.index'));
    }

    /**
     * Display the specified Subtitulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subtitulo = $this->subtituloRepository->findWithoutFail($id);

        if (empty($subtitulo)) {
            Flash::error('Subtitulo not found');

            return redirect(route('subtitulos.index'));
        }
        
        $subtitulo2s =  DB::select("
            SELECT s2.`id`,p.`descripcion` as pregunta,s2.`variable` FROM `subtitulo2` s2,`preguntas` p WHERE s2.`idsubtitulo2`=".$id."  AND s2.`pregunta`=p.`id`
        ");

        $preguntas=DB::table('preguntas')
            ->select('descripcion', 'id')
            ->pluck('descripcion','id');

        return view('subtitulos.show')->with('subtitulo', $subtitulo)->with('subtitulo2s', $subtitulo2s)->with('preguntas', $preguntas);
    }

    /**
     * Show the form for editing the specified Subtitulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subtitulo = $this->subtituloRepository->findWithoutFail($id);

        if (empty($subtitulo)) {
            Flash::error('Subtitulo not found');

            return redirect(route('subtitulos.index'));
        }

        return view('subtitulos.edit')->with('subtitulo', $subtitulo);
    }

    /**
     * Update the specified Subtitulo in storage.
     *
     * @param  int              $id
     * @param UpdateSubtituloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubtituloRequest $request)
    {
        $subtitulo = $this->subtituloRepository->findWithoutFail($id);

        if (empty($subtitulo)) {
            Flash::error('Subtitulo not found');

            return redirect(route('subtitulos.index'));
        }

        $subtitulo = $this->subtituloRepository->update($request->all(), $id);

        Flash::success('Subtitulo Actualizado con exito.');

        return redirect(route('subtitulos.index'));
    }

    /**
     * Remove the specified Subtitulo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subtitulo = $this->subtituloRepository->findWithoutFail($id);

        if (empty($subtitulo)) {
            Flash::error('Subtitulo not found');

            return redirect(route('subtitulos.index'));
        }

        $this->subtituloRepository->delete($id);

        Flash::success('Subtitulo Borrado con exito.');

        return redirect(route('subtitulos.index'));
    }
}
