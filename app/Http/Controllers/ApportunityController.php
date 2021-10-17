<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApportunityStore;
use App\Http\Resources\ApportunityCollection;
use App\Models\Apportunity;
use Illuminate\Http\Request;

class ApportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ApportunityCollection(Apportunity::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApportunityStore $request)
    {
        // valdiate the request from the inputs

        // $request->validate([
        //     'title' => "required|string|min:3|max:255",
        //     'description' => "required|string|min:5|max:255"
        // ]);

        // return "testing route";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apportunity  $apportunity
     * @return \Illuminate\Http\Response
     */
    public function show(Apportunity $apportunity)
    {
        return $apportunity;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apportunity  $apportunity
     * @return \Illuminate\Http\Response
     */
    public function edit(Apportunity $apportunity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apportunity  $apportunity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apportunity $apportunity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apportunity  $apportunity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apportunity $apportunity)
    {
        //
    }
}
