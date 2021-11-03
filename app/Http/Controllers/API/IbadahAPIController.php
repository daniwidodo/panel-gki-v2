<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIbadahAPIRequest;
use App\Http\Requests\API\UpdateIbadahAPIRequest;
use App\Models\Ibadah;
use App\Repositories\IbadahRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class IbadahController
 * @package App\Http\Controllers\API
 */

class IbadahAPIController extends AppBaseController
{
    /** @var  IbadahRepository */
    private $ibadahRepository;

    public function __construct(IbadahRepository $ibadahRepo)
    {
        $this->ibadahRepository = $ibadahRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/ibadahs",
     *      summary="Get a listing of the Ibadahs.",
     *      tags={"Ibadah"},
     *      description="Get all Ibadahs",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Ibadah")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $ibadahs = $this->ibadahRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ibadahs->toArray(), 'Ibadahs retrieved successfully');
    }

    /**
     * @param CreateIbadahAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ibadahs",
     *      summary="Store a newly created Ibadah in storage",
     *      tags={"Ibadah"},
     *      description="Store Ibadah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Ibadah that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Ibadah")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Ibadah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIbadahAPIRequest $request)
    {
        $input = $request->all();

        $ibadah = $this->ibadahRepository->create($input);

        return $this->sendResponse($ibadah->toArray(), 'Ibadah saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/ibadahs/{id}",
     *      summary="Display the specified Ibadah",
     *      tags={"Ibadah"},
     *      description="Get Ibadah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ibadah",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Ibadah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Ibadah $ibadah */
        $ibadah = $this->ibadahRepository->find($id);

        if (empty($ibadah)) {
            return $this->sendError('Ibadah not found');
        }

        return $this->sendResponse($ibadah->toArray(), 'Ibadah retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateIbadahAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ibadahs/{id}",
     *      summary="Update the specified Ibadah in storage",
     *      tags={"Ibadah"},
     *      description="Update Ibadah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ibadah",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Ibadah that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Ibadah")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Ibadah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIbadahAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ibadah $ibadah */
        $ibadah = $this->ibadahRepository->find($id);

        if (empty($ibadah)) {
            return $this->sendError('Ibadah not found');
        }

        $ibadah = $this->ibadahRepository->update($input, $id);

        return $this->sendResponse($ibadah->toArray(), 'Ibadah updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ibadahs/{id}",
     *      summary="Remove the specified Ibadah from storage",
     *      tags={"Ibadah"},
     *      description="Delete Ibadah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Ibadah",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Ibadah $ibadah */
        $ibadah = $this->ibadahRepository->find($id);

        if (empty($ibadah)) {
            return $this->sendError('Ibadah not found');
        }

        $ibadah->delete();

        return $this->sendSuccess('Ibadah deleted successfully');
    }
}
