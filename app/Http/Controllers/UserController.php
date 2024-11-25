<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    protected $repo;
    protected $request=UserRequest::class;
    protected $resource=UserResource::class;
    /**
     * Display a listing of the resource.
     */
    function __construct(UserContract $repo)
    {
        $this->repo=$repo;
    }
    public function index()
    {
        $data=$this->repo->get();
        return response()->json([
            'data' => $this->resource::collection($data),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $data=$this->repo->create(app($this->request)->validated());
        return response()->json([
            'message' => 'data created successfully',
            'data' => new $this->resource($data),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data=$this->repo->findOrFail($id);
            return response()->json([
                'data' => new  $this->resource($data),
            ]);
        } catch(ModelNotFoundException) {
            return response()->json([
                'message' => 'Offer not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        try {
            $data = $this->repo->update(data: app($this->request)->validated(), id: $id);
            return response()->json([
                'message' => 'data updated successfully',
                'data' => new $this->resource($data),
            ]);
        } catch (ModelNotFoundException) {
            return response()->json([
                'message' => 'data not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data=$this->repo->findOrFail($id);
            $data->delete();
            return response()->json([
                'message' => 'Offer deleted successfully',
            ]);
        } catch(ModelNotFoundException) {
            return response()->json([
                'message' => 'Offer not found',
            ], 404);
        }
    }
}
