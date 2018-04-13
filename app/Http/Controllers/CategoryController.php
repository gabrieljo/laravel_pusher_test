<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function store(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

        return response('created', Response::HTTP_CREATED);
    }

    public function index(){
        return Category::latest()->get();
    }

    public function show(Category $category){
        return $category;
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
