<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApportunityStore;
use App\Http\Resources\Apportunity as ApportunityResources;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApportunityStore $request)
    {

        $apportunity = Apportunity::create([
            'title'       => $request->title,
            "description" => $request->description,
            "country_id"   => $request->countryId,
            "category_id"  => $request->categoryId,
            "organizer"   => $request->organizer,
            "created_by"   => $request->createdBy,
            "deadline"    => $request->deadline
        ]);

        return new ApportunityResources($apportunity);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apportunity  $apportunity
     * @return \Illuminate\Http\Response
     */
    public function show(Apportunity $apportunity)
    {
        return new ApportunityResources($apportunity);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apportunity  $apportunity
     * @return \Illuminate\Http\Response
     */
    public function update(ApportunityStore $request, Apportunity $apportunity)
    {
        $apportunity->update([
            'title'       => $request->title,
            "description" => $request->description,
            "country_id"   => $request->countryId,
            "category_id"  => $request->categoryId,
            "organizer"   => $request->organizer,
            "created_by"   => $request->createdBy,
            "deadline"    => $request->deadline
        ]);

        return new ApportunityResources($apportunity);
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
