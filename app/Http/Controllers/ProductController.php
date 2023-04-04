<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {

        $product = Product::all();
        $company = Company::all();
        foreach ($product as $item) {
            $item->company;
        }
        $data = [
            'pages' => ['pages.product'],
            'title' => "Trang chu",
            'product' => $product,
            'company' => $company
        ];
        return view('master_layout', $data);
    }

    public function store(Request $request)
    {
        $product = Product::create([
            "name" => $request->get('name'),
            "company_id" => $request->get('company'),
            "image" => $request->get('image'),
            "frequency" => $request->get('frequency'),
            "packing" => $request->get('packing'),
            "effect" => $request->get('effect'),
            "registration_number" => $request->get('registration_number'),
            "price" => $request->get('price'),
        ]);

        return Redirect::to('product', 301);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return false;
        } else {
            $product->delete();
            return 'deleted';
        }
    }

    public function getView(Request $request)
    {
        $product = Product::all();
        $company = Company::all();
        foreach ($product as $item) {
            $item->company;
        }
        $data = [
            'pages' => ['pages.tr_order'],
            'product' => $product,
            'company' => $company,
            'stt' => $request->get('stt')
        ];
        return view('ajax_layout', $data);
    }

    public function getAll()
    {
        $product = Product::all();
        $company = Company::all();
        foreach ($product as $item) {
            $item->company;
        }
        return $product;
    }
}
