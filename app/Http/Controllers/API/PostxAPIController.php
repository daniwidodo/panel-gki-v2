<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePostxAPIRequest;
use App\Http\Requests\API\UpdatePostxAPIRequest;
use App\Models\Postx;
use App\Repositories\PostxRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PostxController
 * @package App\Http\Controllers\API
 */

class PostxAPIController extends AppBaseController
{
    /** @var  PostxRepository */
    private $postxRepository;

    public function __construct(PostxRepository $postxRepo)
    {
        $this->postxRepository = $postxRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/postxes",
     *      summary="Get a listing of the Postxes.",
     *      tags={"Postx"},
     *      description="Get all Postxes",
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
     *                  @SWG\Items(ref="#/definitions/Postx")
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
        $postxes = $this->postxRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($postxes->toArray(), 'Postxes retrieved successfully');
    }

    /**
     * @param CreatePostxAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/postxes",
     *      summary="Store a newly created Postx in storage",
     *      tags={"Postx"},
     *      description="Store Postx",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Postx that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Postx")
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
     *                  ref="#/definitions/Postx"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePostxAPIRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image_url')) {

            //Validate the uploaded file
            $Validation = $request->validate([

                'image_url' => 'required|mimes:png,jpg,jpeg|max:2048    '
            ]);

            // cache the file
            $file = $Validation['image_url'];
            $originalName = $file->getClientOriginalName();
          

            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'images_' . time() . '.' . $file->getClientOriginalExtension();

            // save to storage/app/infrastructure as the new $filename
            $InfrasFileName = $file->storeAs('public', $filename);

            $path = $InfrasFileName;
        }

        $input['image_url'] = $path;


        $postx = $this->postxRepository->create($input);

        return $this->sendResponse($postx->toArray(), 'Postx saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/postxes/{id}",
     *      summary="Display the specified Postx",
     *      tags={"Postx"},
     *      description="Get Postx",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Postx",
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
     *                  ref="#/definitions/Postx"
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
        /** @var Postx $postx */
        $postx = $this->postxRepository->find($id);

        if (empty($postx)) {
            return $this->sendError('Postx not found');
        }

        return $this->sendResponse($postx->toArray(), 'Postx retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePostxAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/postxes/{id}",
     *      summary="Update the specified Postx in storage",
     *      tags={"Postx"},
     *      description="Update Postx",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Postx",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Postx that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Postx")
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
     *                  ref="#/definitions/Postx"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePostxAPIRequest $request)
    {
        $input = $request->all();

        /** @var Postx $postx */
        $postx = $this->postxRepository->find($id);

        if (empty($postx)) {
            return $this->sendError('Postx not found');
        }

        $postx = $this->postxRepository->update($input, $id);

        return $this->sendResponse($postx->toArray(), 'Postx updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/postxes/{id}",
     *      summary="Remove the specified Postx from storage",
     *      tags={"Postx"},
     *      description="Delete Postx",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Postx",
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
        /** @var Postx $postx */
        $postx = $this->postxRepository->find($id);

        if (empty($postx)) {
            return $this->sendError('Postx not found');
        }

        $postx->delete();

        return $this->sendSuccess('Postx deleted successfully');
    }

    
}
