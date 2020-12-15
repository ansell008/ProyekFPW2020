<?php

namespace App\Http\Controllers;

use App\Apartment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Favorit;
use App\Review;
use App\Transaksi;

class CustomerController extends Controller
{
    //
    public function index(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $negara = DB::table('negara')->get();
        $rekom=DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id and a.apaartment_rating>=4');
        $posting = DB::select('select * from apartment a,user u, tipe_apartment tp,kategori ka,negara n ,kota ko where a.user_id=u.user_id and a.tipe_apartment_id=tp.tipe_apartment_id and a.kategori_id=ka.kategori_id and a.negara_id=n.negara_id and a.kota_id=ko.kota_id');
        $rating = DB::select("SELECT user_id, avg(apaartment_rating) as 'avg' FROM apartment WHERE apaartment_rating!=0 GROUP by user_id");

        //dd($posting);view_ra
        return view("Customer.home", ["aktif_user" => $aktif_user, "negara" => $negara, "posting" => $posting,"rekom"=>$rekom,"rating"=>$rating]);
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
        if($posting[0]->kategori_id==1){
            $req->session()->put('posting',$posting[0]);
            return redirect("/detail");
        }else{
            $req->session()->put('posting',$posting[0]);
            return redirect("/detailsewa");
        }
        //return view("Customer.detail", ['dipilih' => $posting[0], 'aktif_user' => $aktif_user]);


    }
    public function showdetail(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $posting=$req->session()->get('posting');
        return view("Customer.detail",['dipilih' => $posting, 'aktif_user' => $aktif_user]);
    }
    public function showdetailsewa(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $posting=$req->session()->get('posting');
        return view("Customer.detailsewa",['dipilih' => $posting, 'aktif_user' => $aktif_user]);
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
        return redirect("/homecustomer")->with('beli',"berhasil menambah favorit!");
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
        DB::update('update apartment set apartment_status = 1 where apartment_id = ?', [$req->idap]);
        DB::table('transaksi')->insert([
            'apartment_id'=>$req->idap,
            'user_id'=>$req->idus,
            'transaksi_status'=>0,
            'transaksi_tanggal_selesai'=>null,
            'transaksi_total_harga'=>$req->harga,
            'transaksi_tanggal_beli'=>$mytime,
            'created_at'=>$tgl,
            'updated_at'=>$tgl
        ]);
        return redirect("/homecustomer")->with('beli',"berhasil melakukan transaksi!");
    }

    public function sewa(Request $req)
    {
        $mytime = date('Y-m-d H:i:s');
        $tgl=date('Y-m-d');
        $selesai=$req->selesai;
        DB::update('update apartment set apartment_status = 1 where apartment_id = ?', [$req->idap]);
        DB::table('transaksi')->insert([
            'apartment_id'=>$req->idap,
            'user_id'=>$req->idus,
            'transaksi_status'=>0,
            'transaksi_tanggal_selesai'=>$selesai,
            'transaksi_total_harga'=>$req->harga,
            'transaksi_tanggal_beli'=>$mytime,
            'created_at'=>$tgl
        ]);
        return redirect("/homecustomer")->with('beli',"berhasil melakukan transaksi!");
    }

    public function history(Request $req){
        $aktif_user = $req->session()->get("aktif_user");
        $transaksi =Transaksi::where('user_id','=',$aktif_user->user_id)->get();

        return view("Customer.historyCustomer",["allApartment"=>$transaksi,"aktif_user"=>$aktif_user ]);
    }

    public function detailTransaksi(Request $req, $id ){
        $req->session()->put("idTransaksi", $id);
        return redirect("/viewdetailtransaksi");
    }
    public function viewDetailTransaksi(Request $req)
    {
        $id = $req->session()->get("idTransaksi");
        $apartment = Transaksi::find($id);
        $aktif_user = $req->session()->get("aktif_user");
        $counts = DB::select('select count(*) as jum from review where user_id = "'.$aktif_user->user_id.'" and apartment_id= "'.$apartment->apartment_id.'" ');
        // dd($counts);


        return view("Customer.detailHistory", [
            "aktif_user" => $aktif_user,
            "transaksi" => $apartment,
            "counts"=>$counts
        ]);
    }

    public function review(Request $req, $id){
        $aktif_user = $req->session()->get("aktif_user");
        $validateData = $req->validate(
            [
                "rating" => ['numeric','min:1','max:5']
            ],
            [
                "numeric" => "Rating must be number"
            ]
        );

        Review::create([
            "user_id"=>$aktif_user->user_id,
            "apartment_id"=> $id,
            "review_rate"=>$validateData["rating"],
            "review_isi"=>$req->review,
            "created_at"=>time()
        ]);
        $apart = Apartment::find($id);
        $counts = DB::select('select avg(review_rate) as jum from review where apartment_id= "'.$apart->apartment_id.'" ');



        $apart->apartment_rating = $counts[0]->jum;
        $apart->save();

        return redirect("/viewdetailtransaksi")->with('review',"Review Sukses");
    }

}
