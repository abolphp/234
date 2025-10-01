<?php

namespace Modules\Category\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\app\Http\Requests\CategoryRequest;
use Modules\Category\app\Models\Category;
use Modules\Category\app\Repositories\CategoryRepository;

class CategoryController extends Controller
{

    public $repository;

    public function __construct(CategoryRepository $repository){
        $this->repository = $repository;
    }
    public function index()
    {
        $Categories = $this->repository->all();
        return response()->json([
            'data' => $Categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request) {
        $Category = $this->repository->store($request);
        return response()->json([
            'message' => 'Category created successfully',
            'data' => $Category,
        ]);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $Category = $this->repository->FindById($id);
        return response()->json([
            'data' => $Category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id , CategoryRequest $request) {

        $Category = $this->repository->FindById($id);
        $this->repository->update($request, $id);
        return response()->json([
            'message' => 'Category updated successfully',
            'NewData' => $Category,
        ]);
    }
    public function destroy($id){
        Category::destroy($id);
        return response()->json([
            'message' => 'Category deleted successfully',
        ]);
    }
}
