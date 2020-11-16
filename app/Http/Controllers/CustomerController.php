<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        return view("Customer.home", ["aktif_user" => $aktif_user]);
    }
}
