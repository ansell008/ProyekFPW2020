<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Favorit;

class CustomerController extends Controller
{
    //
    public function index(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $negara = DB::table('negara')->get();
        $rekom=DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id and a.apaartment_rating>=4');
        $posting = DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id');
        //dd($posting);view_ra
        return view("Customer.home", ["aktif_user" => $aktif_user, "negara" => $negara, "posting" => $posting,"rekom"=>$rekom]);
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

    public function search(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $negara = DB::table('negara')->get();
        $nn=$req->country;
        $kk=$req->city;
        $posting = DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id and n.negara_id=? and ko.kota_id=?',[$req->country,$req->city]);
        $kota=DB::table('kota')->where('negara_id',$nn)->get();
        return view("Customer.home", ["aktif_user" => $aktif_user, "negara" => $negara,"kota"=>$kota, "posting" => $posting,"nn"=>$nn,"kk"=>$kk
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

    public function favorit(Request $req)
    {
        $mytime = date('Y-m-d H:i:s');
        $tgl=date('Y-m-d');
        DB::table('favorit')->insert([
            'user_id'=>$req->idus,
            'apartment_id'=>$req->idap,
            'created_at'=>$mytime
        ]);
        $req->session()->put('beli',"berhasil menambah favorit!");
        return redirect("/homecustomer");
    }

    public function deleteFavorit(Request $req, $id)
    {
        Favorit::where('favorit_id', $id)->delete();
        return redirect("/halamanFavorit");
    }

    public function toFavorit(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $negara = DB::table('negara')->get();

        $posting = DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko,favorit f where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id and a.apartment_id=f.apartment_id');
        //dd($posting);
        return view("Customer.favorit", ["aktif_user" => $aktif_user, "negara" => $negara, "favorit" => $posting]);
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
