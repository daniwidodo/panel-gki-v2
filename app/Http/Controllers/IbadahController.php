<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIbadahRequest;
use App\Http\Requests\UpdateIbadahRequest;
use App\Repositories\IbadahRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class IbadahController extends AppBaseController
{
    /** @var  IbadahRepository */
    private $ibadahRepository;

    public function __construct(IbadahRepository $ibadahRepo)
    {
        $this->ibadahRepository = $ibadahRepo;
    }

    /**
     * Display a listing of the Ibadah.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ibadahs = $this->ibadahRepository->paginate(10);

        return view('ibadahs.index')
            ->with('ibadahs', $ibadahs);
    }

    /**
     * Show the form for creating a new Ibadah.
     *
     * @return Response
     */
    public function create()
    {
        return view('ibadahs.create');
    }

    /**
     * Store a newly created Ibadah in storage.
     *
     * @param CreateIbadahRequest $request
     *
     * @return Response
     */
    public function store(CreateIbadahRequest $request)
    {
        $input = $request->all();

        $ibadah = $this->ibadahRepository->create($input);

        Flash::success('Ibadah saved successfully.');

        return redirect(route('ibadahs.index'));
    }

    /**
     * Display the specified Ibadah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ibadah = $this->ibadahRepository->find($id);

        if (empty($ibadah)) {
            Flash::error('Ibadah not found');

            return redirect(route('ibadahs.index'));
        }

        return view('ibadahs.show')->with('ibadah', $ibadah);
    }

    /**
     * Show the form for editing the specified Ibadah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ibadah = $this->ibadahRepository->find($id);

        if (empty($ibadah)) {
            Flash::error('Ibadah not found');

            return redirect(route('ibadahs.index'));
        }

        return view('ibadahs.edit')->with('ibadah', $ibadah);
    }

    /**
     * Update the specified Ibadah in storage.
     *
     * @param int $id
     * @param UpdateIbadahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIbadahRequest $request)
    {
        $ibadah = $this->ibadahRepository->find($id);

        if (empty($ibadah)) {
            Flash::error('Ibadah not found');

            return redirect(route('ibadahs.index'));
        }

        $ibadah = $this->ibadahRepository->update($request->all(), $id);

        Flash::success('Ibadah updated successfully.');

        return redirect(route('ibadahs.index'));
    }

    /**
     * Remove the specified Ibadah from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ibadah = $this->ibadahRepository->find($id);

        if (empty($ibadah)) {
            Flash::error('Ibadah not found');

            return redirect(route('ibadahs.index'));
        }

        $this->ibadahRepository->delete($id);

        Flash::success('Ibadah deleted successfully.');

        return redirect(route('ibadahs.index'));
    }
}
