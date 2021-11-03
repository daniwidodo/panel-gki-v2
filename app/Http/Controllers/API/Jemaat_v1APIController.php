<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJemaat_v1APIRequest;
use App\Http\Requests\API\UpdateJemaat_v1APIRequest;
use App\Models\Jemaat_v1;
use App\Repositories\Jemaat_v1Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Jemaat_v1Controller
 * @package App\Http\Controllers\API
 */

class Jemaat_v1APIController extends AppBaseController
{
    /** @var  Jemaat_v1Repository */
    private $jemaatV1Repository;

    public function __construct(Jemaat_v1Repository $jemaatV1Repo)
    {
        $this->jemaatV1Repository = $jemaatV1Repo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/jemaatV1s",
     *      summary="Get a listing of the Jemaat_v1s.",
     *      tags={"Jemaat_v1"},
     *      description="Get all Jemaat_v1s",
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
     *                  @SWG\Items(ref="#/definitions/Jemaat_v1")
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
        $jemaatV1s = $this->jemaatV1Repository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($jemaatV1s->toArray(), 'Jemaat V1S retrieved successfully');
    }

    /**
     * @param CreateJemaat_v1APIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/jemaatV1s",
     *      summary="Store a newly created Jemaat_v1 in storage",
     *      tags={"Jemaat_v1"},
     *      description="Store Jemaat_v1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Jemaat_v1 that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Jemaat_v1")
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
     *                  ref="#/definitions/Jemaat_v1"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateJemaat_v1APIRequest $request)
    {
        $input = $request->all();

        $jemaatV1 = $this->jemaatV1Repository->create($input);

        return $this->sendResponse($jemaatV1->toArray(), 'Jemaat V1 saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/jemaatV1s/{id}",
     *      summary="Display the specified Jemaat_v1",
     *      tags={"Jemaat_v1"},
     *      description="Get Jemaat_v1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Jemaat_v1",
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
     *                  ref="#/definitions/Jemaat_v1"
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
        /** @var Jemaat_v1 $jemaatV1 */
        $jemaatV1 = $this->jemaatV1Repository->find($id);

        if (empty($jemaatV1)) {
            return $this->sendError('Jemaat V1 not found');
        }

        return $this->sendResponse($jemaatV1->toArray(), 'Jemaat V1 retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateJemaat_v1APIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/jemaatV1s/{id}",
     *      summary="Update the specified Jemaat_v1 in storage",
     *      tags={"Jemaat_v1"},
     *      description="Update Jemaat_v1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Jemaat_v1",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Jemaat_v1 that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Jemaat_v1")
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
     *                  ref="#/definitions/Jemaat_v1"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateJemaat_v1APIRequest $request)
    {
        $input = $request->all();

        /** @var Jemaat_v1 $jemaatV1 */
        $jemaatV1 = $this->jemaatV1Repository->find($id);

        if (empty($jemaatV1)) {
            return $this->sendError('Jemaat V1 not found');
        }

        $jemaatV1 = $this->jemaatV1Repository->update($input, $id);

        return $this->sendResponse($jemaatV1->toArray(), 'Jemaat_v1 updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/jemaatV1s/{id}",
     *      summary="Remove the specified Jemaat_v1 from storage",
     *      tags={"Jemaat_v1"},
     *      description="Delete Jemaat_v1",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Jemaat_v1",
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
        /** @var Jemaat_v1 $jemaatV1 */
        $jemaatV1 = $this->jemaatV1Repository->find($id);

        if (empty($jemaatV1)) {
            return $this->sendError('Jemaat V1 not found');
        }

        $jemaatV1->delete();

        return $this->sendSuccess('Jemaat V1 deleted successfully');
    }
}
