<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Repositories\Contracts\SubscriptionContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubscriptionController extends Controller
{
    protected $repo;
    protected $Request=SubscriptionRequest::class;
    protected $resource=SubscriptionResource::class;
    /**
     * Display a listing of the resource.
     */
    function __construct(SubscriptionContract $repo)
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

        $data=$this->repo->create(app($this->Request)->validated());

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
        $data=$this->repo->update(app($this->Request)->validated(),$id);

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
