<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Repositories\Contracts\UserContract;

class ArticleController extends Controller
{
    protected $repo;
    protected $storeRequest = ArticleRequest::class;
    protected $updateRequest = ArticleRequest::class;
    protected $resource = ArticleResource::class;
    /**
     * Display a listing of the resource.
     */
    public function __construct(UserContract $repo)
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
    $data = $this->repo->create(app($this->storeRequest)->validated());
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
        $data = $this->repo->find($id);
        if (!$data) {
            return response()->json(['message' => 'data not found'], 404);
        }
        return response()->json([
            'data' => new $this->resource($data),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $data = $this->repo->update(app($this->updateRequest)->validated(), $id);

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
        $data = $this->repo->delete($id);
        return response()->json([
            'message' => 'data deleted successfully',
        ]);
    }
}
