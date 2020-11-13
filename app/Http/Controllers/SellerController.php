<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    public function index(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        return view("Seller.home", ["aktif_user" => $aktif_user]);
    }

    public function viewAddApartment(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        return view("Seller.addApartment", ["aktif_user" => $aktif_user]);
    }

    public function AddApartment(Request $req)
    {
    }

    public function DetailApartment(Request $req)
    {
    }

    public function DeleteApartment(Request $req)
    {
    }

    public function viewListOrder(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        return view("addApartment", [["aktif_user" => $aktif_user]]);
    }
}
