<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lookups\Category;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\lookups\CategoryCollection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CategoryCollection(Category::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the request

        $validator = Validator::make($request->all(), [
            'name' => "string|required|max:255"
        ]);

        if ($validator->fails()) {

            return response(['errors' => $validator->errors()], 422);
        }

        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // validate the request

        $validator = Validator::make($request->all(), [
            'name' => "string|required|max:255"
        ]);

        if ($validator->fails()) {

            return response(['errors' => $validator->errors()], 422);
        }


        $category->update($request->all());

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // $category->delete();
    }
}
