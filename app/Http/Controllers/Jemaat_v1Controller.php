<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJemaat_v1Request;
use App\Http\Requests\UpdateJemaat_v1Request;
use App\Repositories\Jemaat_v1Repository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Jemaat_v1Controller extends AppBaseController
{
    /** @var  Jemaat_v1Repository */
    private $jemaatV1Repository;

    public function __construct(Jemaat_v1Repository $jemaatV1Repo)
    {
        $this->jemaatV1Repository = $jemaatV1Repo;
    }

    /**
     * Display a listing of the Jemaat_v1.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jemaatV1s = $this->jemaatV1Repository->paginate(10);

        return view('jemaat_v1s.index')
            ->with('jemaatV1s', $jemaatV1s);
    }

    /**
     * Show the form for creating a new Jemaat_v1.
     *
     * @return Response
     */
    public function create()
    {
        return view('jemaat_v1s.create');
    }

    /**
     * Store a newly created Jemaat_v1 in storage.
     *
     * @param CreateJemaat_v1Request $request
     *
     * @return Response
     */
    public function store(CreateJemaat_v1Request $request)
    {
        $input = $request->all();

        $jemaatV1 = $this->jemaatV1Repository->create($input);

        Flash::success('Jemaat V1 saved successfully.');

        return redirect(route('jemaatV1s.index'));
    }

    /**
     * Display the specified Jemaat_v1.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jemaatV1 = $this->jemaatV1Repository->find($id);

        if (empty($jemaatV1)) {
            Flash::error('Jemaat V1 not found');

            return redirect(route('jemaatV1s.index'));
        }

        return view('jemaat_v1s.show')->with('jemaatV1', $jemaatV1);
    }

    /**
     * Show the form for editing the specified Jemaat_v1.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jemaatV1 = $this->jemaatV1Repository->find($id);

        if (empty($jemaatV1)) {
            Flash::error('Jemaat V1 not found');

            return redirect(route('jemaatV1s.index'));
        }

        return view('jemaat_v1s.edit')->with('jemaatV1', $jemaatV1);
    }

    /**
     * Update the specified Jemaat_v1 in storage.
     *
     * @param int $id
     * @param UpdateJemaat_v1Request $request
     *
     * @return Response
     */
    public function update($id, UpdateJemaat_v1Request $request)
    {
        $jemaatV1 = $this->jemaatV1Repository->find($id);

        if (empty($jemaatV1)) {
            Flash::error('Jemaat V1 not found');

            return redirect(route('jemaatV1s.index'));
        }

        $jemaatV1 = $this->jemaatV1Repository->update($request->all(), $id);

        Flash::success('Jemaat V1 updated successfully.');

        return redirect(route('jemaatV1s.index'));
    }

    /**
     * Remove the specified Jemaat_v1 from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jemaatV1 = $this->jemaatV1Repository->find($id);

        if (empty($jemaatV1)) {
            Flash::error('Jemaat V1 not found');

            return redirect(route('jemaatV1s.index'));
        }

        $this->jemaatV1Repository->delete($id);

        Flash::success('Jemaat V1 deleted successfully.');

        return redirect(route('jemaatV1s.index'));
    }
}
