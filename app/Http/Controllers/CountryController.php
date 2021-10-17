<?php

namespace App\Http\Controllers;

use App\Http\Resources\lookups\Country as CountryResource;
use Illuminate\Http\Request;
use App\Models\Lookups\Country;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\lookups\CountryCollection;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return new CountryCollection(Country::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate the inputs with validateInput function

        if ($this->validateInputs($request)->fails()) {

            return response()->json(
                $this->validateInputs($request)->errors(),
                422
            );
        }

        $country =  Country::create([
            "name" => $request->name,
            "phone_code" => $request->phoneCode,
            "country_code" => $request->countryCode
        ]);

        return new CountryResource($country);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lookups\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return new  CountryResource(Country::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lookups\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookups\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        // validate the inputs with validateInput function

        if ($this->validateInputs($request)->fails()) {

            return response()->json(
                $this->validateInputs($request)->errors(),
                422
            );
        }

        $country->update([
            "name" => $request->name,
            "phone_code" => $request->phoneCode,
            "country_code" => $request->countryCode
        ]);

        return new CountryResource($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookups\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
    }

    private function validateInputs(Request $request)
    {
        return Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "phoneCode" => "required|numeric|max:400",
            "countryCode" => "required|numeric|max:400"
        ]);
    }
}
