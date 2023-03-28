<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {

        $data = [
            'pages' => ['pages.dashboard'],
            'title' => "Trang chu",
        ];
        return view('master_layout', $data);
    }
}
