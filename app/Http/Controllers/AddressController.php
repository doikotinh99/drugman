<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\AddressCity;
use App\Models\AddressDistrict;
use App\Models\AddressWard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    public function getCity(){
        $city = AddressCity::all();
        return $city;
    }

    public function getDistrict($id){
        $district = AddressDistrict::where('city_id', $id)->get();
        return $district;
    }

    public function getWard($id){
        $district = AddressWard::where('district_id', $id)->get();
        return $district;
    }
}