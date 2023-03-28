<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Gender;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VendorController extends Controller
{
    public function index()
    {

        $vendor = Vendor::all();
        foreach ($vendor as $item) {
            $item->isGender;
            $item->isAddress->isCity;
            $item->isAddress->isDistrict;
            $item->isAddress->isWards;
        }
        $gender = Gender::all();
        $data = [
            'pages' => ['pages.vendor'],
            'title' => "Trang chu",
            'vendor' => $vendor,
            'gender' => $gender
        ];
        return view('master_layout', $data);
    }

    public function store(Request $request)
    {
        $address = Address::create([
            'city' => $request->get('AddressCity'),
            'district' => $request->get('AddressDistrict'),
            'ward' => $request->get('AddressWard'),
            'detail' => $request->get('AddressDetail')
        ]);
        $id = $address->id;
        Vendor::create([
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'phone' => $request->get('phone'),
            'address_id' => $id
        ]);

        return Redirect::to('vendor', 301);
    }

    public function destroy($id)
    {
        $product = Vendor::find($id);
        if ($product == null) {
            return false;
        } else {
            $product->delete();
            return 'deleted';
        }
    }
}
