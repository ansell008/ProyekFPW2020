<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function index(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $negara=DB::table('negara')->get();
        $kota=DB::table('kota')->get();
        $posting=DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id');
        //dd($posting);
        return view("Customer.home", ["aktif_user" => $aktif_user,"negara"=>$negara,"kota"=>$kota,"posting"=>$posting]);
    }

    public function detail($id,Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $posting=DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id and a.apartment_id=?',[$id]);
        return view("Customer.detail",['dipilih'=>$posting[0],'aktif_user'=>$aktif_user]);
    }
}
