<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Repositories\Contracts\CommentContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentController extends Controller
{
    protected $repo;
    protected $commentRequest = CommentRequest::class;
    protected $resource = CommentResource::class;
    /**
     * Display a listing of the resource.
     */
    public function __construct(CommentContract $repo)
    {
        $this->repo = $repo;
    }
    public function index()
    {
        $data = $this->repo->get();

        return response()->json([
            'data' => $this->resource::collection($data),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $data = $this->repo->create(app($this->commentRequest)->validated());

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
        $data = $this->repo->update(app($this->commentRequest)->validated(), $id);

        return response()->json([
            'message' => 'data updated successfully',
            'data' => new $this->resource($data),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repo->delete($id);
        return response()->json([
            'message' => 'data deleted successfully',
        ]);
    }
}
