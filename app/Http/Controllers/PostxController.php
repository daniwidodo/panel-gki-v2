<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostxRequest;
use App\Http\Requests\UpdatePostxRequest;
use App\Repositories\PostxRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Flash;
use Response;

class PostxController extends AppBaseController
{
    /** @var  PostxRepository */
    private $postxRepository;

    public function __construct(PostxRepository $postxRepo)
    {
        $this->postxRepository = $postxRepo;
    }

    /**
     * Display a listing of the Postx.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $postxes = $this->postxRepository->paginate(10);

        return view('postxes.index')
            ->with('postxes', $postxes);
    }

    /**
     * Show the form for creating a new Postx.
     *
     * @return Response
     */
    public function create()
    {
        return view('postxes.create');
    }

    /**
     * Store a newly created Postx in storage.
     *
     * @param CreatePostxRequest $request
     *
     * @return Response
     */
    public function store(CreatePostxRequest $request)
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

        Flash::success('Postx saved successfully.');

        return redirect(route('postxes.index'));
    }

    /**
     * Display the specified Postx.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postx = $this->postxRepository->find($id);

        if (empty($postx)) {
            Flash::error('Postx not found');

            return redirect(route('postxes.index'));
        }

        return view('postxes.show')->with('postx', $postx);
    }

    /**
     * Show the form for editing the specified Postx.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postx = $this->postxRepository->find($id);

        if (empty($postx)) {
            Flash::error('Postx not found');

            return redirect(route('postxes.index'));
        }

        return view('postxes.edit')->with('postx', $postx);
    }

    /**
     * Update the specified Postx in storage.
     *
     * @param int $id
     * @param UpdatePostxRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostxRequest $request)
    {
        $postx = $this->postxRepository->find($id);

        if (empty($postx)) {
            Flash::error('Postx not found');

            return redirect(route('postxes.index'));
        }

        $postx = $this->postxRepository->update($request->all(), $id);

        Flash::success('Postx updated successfully.');

        return redirect(route('postxes.index'));
    }

    /**
     * Remove the specified Postx from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postx = $this->postxRepository->find($id);

        if (empty($postx)) {
            Flash::error('Postx not found');

            return redirect(route('postxes.index'));
        }

        $this->postxRepository->delete($id);

        Flash::success('Postx deleted successfully.');

        return redirect(route('postxes.index'));
    }

    // public function storeApi(Request $request)
    // {

    //    $validator = Validator::make($request->all(), 
    //           [ 
    //           'title' => 'required',
    //           'image_url' => 'required|mimes:png,jpg|max:2048',
    //          ]);   

    // if ($validator->fails()) {          
    //         return response()->json(['error'=>$validator->errors()], 401);                        
    //      }  


    //     if ($files = $request->file('file')) {

    //         //store file into document folder
    //         $file = $request->file->store('public/documents');

    //         //store your file into database
    //         $document = new Document();
    //         $document->title = $file;
    //         $document->user_id = $request->user_id;
    //         $document->save();

    //         return response()->json([
    //             "success" => true,
    //             "message" => "File successfully uploaded",
    //             "file" => $file
    //         ]);

    //     }


    // }
}
