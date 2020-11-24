<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function index(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $negara = DB::table('negara')->get();

        $posting = DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id');
        //dd($posting);
        return view("Customer.home", ["aktif_user" => $aktif_user, "negara" => $negara, "posting" => $posting]);
    }

    public function ubahkota(Request $req)
    {


        $aktif_user = $req->session()->get("aktif_user");
        $negara = DB::table('negara')->get();
        $nn=$req->negaranya;
        $posting = DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id');
        $kota=DB::table('kota')->where('negara_id',$req->negaranya)->get();
        return view("Customer.home", ["aktif_user" => $aktif_user, "negara" => $negara,"kota"=>$kota, "posting" => $posting,"nn"=>$nn
        ]);

    }

    public function detail($id, Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $posting = DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id and a.apartment_id=?', [$id]);
        //return view("Customer.detail", ['dipilih' => $posting[0], 'aktif_user' => $aktif_user]);
        $req->session()->put('posting',$posting[0]);
        return redirect("/detail");

    }
    public function showdetail(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $posting=$req->session()->get('posting');
        return view("Customer.detail",['dipilih' => $posting, 'aktif_user' => $aktif_user]);
    }

    public function beli(Request $req)
    {
        $mytime = date('Y-m-d H:i:s');
        $tgl=date('Y-m-d');
        DB::table('transaksi')->insert([
            'apartment_id'=>$req->idap,
            'user_id'=>$req->idus,
            'transaksi_status'=>$req->tipe,
            'transaksi_tanggal_selesai'=>$mytime,
            'transaksi_total_harga'=>$req->harga,
            'transaksi_tanggal_beli'=>$mytime,
            'created_at'=>$tgl
        ]);
        $req->session()->put('beli',"berhasil melakukan transaksi!");
        return redirect("/homecustomer");
    }
}
