<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
    }

    public function store(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

        return response('created', Response::HTTP_CREATED);
    }

    public function index(){
        return CategoryResource::collection(Category::latest()->get());
    }

    public function show(Category $category){
        return new CategoryResource($category);
    }

    public function destroy(Category $category){
        $category->delete();
        return response('deleted', Response::HTTP_NO_CONTENT);
    }

    public function update(Request $request, Category $category){
        $category->update(['name'=>$request->name, 'slug'=>str_slug($request->name)]);
        return response('Update', Response::HTTP_ACCEPTED);
    }

}
