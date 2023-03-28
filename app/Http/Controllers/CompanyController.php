<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    //
    public function index()
    {
        $company = Company::all();
        foreach ($company as $item) {
            $item->isAddress->isCity;
            $item->isAddress->isDistrict;
            $item->isAddress->isWards;
        }
        
        $data = [
            'pages' => ['pages.company'],
            'title' => "Trang chu",
            'company' => $company
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

        $product = Company::create([
            "name" => $request->get('name'),
            "address_id" => $id,
            "discount" => $request->get('discount'),
        ]);
        
        return Redirect::to('company', 301);

    }

    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company == null) {
            return false;
        } else {
            $company->delete();
            return 'deleted';
        }
    }
}
