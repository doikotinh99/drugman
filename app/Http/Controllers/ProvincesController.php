<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address_city;
use App\Models\Address_district;
use App\Models\AddressCity;
use App\Models\AddressDistrict;
use App\Models\AddressWard;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProvincesController extends Controller
{
    public function index()
    {
        $province = AddressCity::all();
        foreach($province as $val){
            $val->district;
            foreach($val->district as $distr){
                $distr->ward;
            }
        }
        return $province;
    }

    public function store()
    {
        $response = Http::get('https://provinces.open-api.vn/api/?depth=3')->json();
        foreach($response as $c){
            $city = AddressCity::create([
                "name" => $c["name"]
            ]);
            foreach($c["districts"] as $distr){
                $district = AddressDistrict::create([
                    "name" => $distr["name"],
                    "city_id" => $city->id
                ]);
                foreach($distr["wards"] as $ward){
                    $w = AddressWard::create([
                        "name" => $ward["name"],
                        "district_id" => $district->id
                    ]);
                }
            }
        }
        return response()->json(["data" => $response[0]], 200);
    }

    public function show($id)
    {
        $result = AddressCity::where("id", $id)->get();
        foreach($result as $val){
            $val->district;
            foreach($val->district as $distr){
                $distr->ward;
            }
        }
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}