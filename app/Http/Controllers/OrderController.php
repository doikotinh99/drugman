<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Vendor;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();
        $orderAction = [];
        foreach ($order as $item) {
            $detail = OrderDetail::where('order_id', $item->id)->get();
            $invoice = 0;
            $commission = 0;
            foreach($detail as $prd){
                
                $product = Product::find($prd->product_id);
                if(!$product) continue;
                $company = Company::find($product->company_id);
                $invoice += intval($prd->quantity) * intval($product->price);
                $commission += intval($prd->quantity) * intval($product->price) * intval($company->discount) / 100;
            }
            $item['invoice'] = $invoice;
            $item['commission'] = $commission;
            $item->isVendor;
            $orderAction[] = $item;
        }
        // $order = $orderAction;
        $vendor = Vendor::all();
        foreach ($vendor as $item) {
            $item->isGender;
            $item->isAddress->isCity;
            $item->isAddress->isDistrict;
            $item->isAddress->isWards;
        }
        $data = [
            'pages' => ['pages.order'],
            'title' => "Trang chu",
            'order' => $order,
            'vendor' => $vendor
        ];
        return view('master_layout', $data);
    }

    public function store(Request $request)
    {

        $order = Order::create([
            'vendor_id' => $request->get('vendor')
        ]);
        $id = $order->id;
        $detail = $request->get('product');
        foreach($detail as $key => $productId){
            OrderDetail::create([
                'product_id' => $productId,
                'quantity' => $request->get('count')[$key],
                'order_id' => $id
            ]);
        }
        return Redirect::to('order', 301);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return false;
        } else {
            $order->delete();
            return 'deleted';
        }
    }
}
