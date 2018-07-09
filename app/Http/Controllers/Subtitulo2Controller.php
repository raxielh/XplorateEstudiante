<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubtitulo2Request;
use App\Http\Requests\UpdateSubtitulo2Request;
use App\Repositories\Subtitulo2Repository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Subtitulo2Controller extends AppBaseController
{
    /** @var  Subtitulo2Repository */
    private $subtitulo2Repository;

    public function __construct(Subtitulo2Repository $subtitulo2Repo)
    {
        $this->subtitulo2Repository = $subtitulo2Repo;
    }

    /**
     * Display a listing of the Subtitulo2.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subtitulo2Repository->pushCriteria(new RequestCriteria($request));
        $subtitulo2s = $this->subtitulo2Repository->all();

        return view('subtitulo2s.index')
            ->with('subtitulo2s', $subtitulo2s);
    }

    /**
     * Show the form for creating a new Subtitulo2.
     *
     * @return Response
     */
    public function create()
    {
        return view('subtitulo2s.create');
    }

    /**
     * Store a newly created Subtitulo2 in storage.
     *
     * @param CreateSubtitulo2Request $request
     *
     * @return Response
     */
    public function store(CreateSubtitulo2Request $request)
    {
        $input = $request->all();

        $subtitulo2 = $this->subtitulo2Repository->create($input);

        Flash::success('Subtitulo2 Guardado exitosamente.');

        return back();
    }

    /**
     * Display the specified Subtitulo2.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subtitulo2 = $this->subtitulo2Repository->findWithoutFail($id);

        if (empty($subtitulo2)) {
            Flash::error('Subtitulo2 not found');

            return redirect(route('subtitulo2s.index'));
        }

        return view('subtitulo2s.show')->with('subtitulo2', $subtitulo2);
    }

    /**
     * Show the form for editing the specified Subtitulo2.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subtitulo2 = $this->subtitulo2Repository->findWithoutFail($id);

        if (empty($subtitulo2)) {
            Flash::error('Subtitulo2 not found');

            return redirect(route('subtitulo2s.index'));
        }

        return view('subtitulo2s.edit')->with('subtitulo2', $subtitulo2);
    }

    /**
     * Update the specified Subtitulo2 in storage.
     *
     * @param  int              $id
     * @param UpdateSubtitulo2Request $request
     *
     * @return Response
     */
    public function update($id, UpdateSubtitulo2Request $request)
    {
        $subtitulo2 = $this->subtitulo2Repository->findWithoutFail($id);

        if (empty($subtitulo2)) {
            Flash::error('Subtitulo2 not found');

            return redirect(route('subtitulo2s.index'));
        }

        $subtitulo2 = $this->subtitulo2Repository->update($request->all(), $id);

        Flash::success('Subtitulo2 Actualizado con exito.');

        return back();

    }

    /**
     * Remove the specified Subtitulo2 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subtitulo2 = $this->subtitulo2Repository->findWithoutFail($id);

        if (empty($subtitulo2)) {
            Flash::error('Subtitulo2 not found');

            return redirect(route('subtitulo2s.index'));
        }

        $this->subtitulo2Repository->delete($id);

        Flash::success('Subtitulo2 Borrado con exito.');

        return back();
    }
}
