<?php

namespace App\Http\Controllers;

use App\Http\Requests\MagazineRequest;
use App\Http\Resources\MagazineResource;
use App\Models\Magazine;
use App\Repositories\Contracts\MagazineContract;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MagazineController extends Controller
{

    protected $repo;
    protected $request = MagazineRequest::class;
    protected $resource = MagazineResource::class;

    public function __construct(MagazineContract $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     */
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
        $data = $this->repo->create(app($this->request)->validated());
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
