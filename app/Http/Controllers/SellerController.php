<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\Kategori;
use App\Kota;
use App\Negara;
use App\Tipe_apartment;
use App\Transaksi;
use App\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    public function index(Request $req)
    {
        $allApartment = Apartment::all();
        $allUser = User::all();
        $aktif_user = $req->session()->get("aktif_user");
        $transaksi=DB::select('select * from apartment a,transaksi t where a.apartment_id=t.apartment_id and a.apartment_status=0 and t.transaksi_status=0');
        $count=count($transaksi);
        return view("Seller.home", ["aktif_user" => $aktif_user, "allApartment" => $allApartment, "allUser" => $allUser, "transaksi" => $count]);
    }

    public function goToEditProfile(Request $req){
        $aktif_user = $req->session()->get("aktif_user");
        return view('Seller.editProfile', ["aktif_user" => $aktif_user]);
    }
    public function editProfile(Request $req){
        $id = $req->session()->get("aktif_user")->user_id;
        $pass = $req->password;
        $email = $req->email;
        $nama = $req->nama;
        $phone = $req->phone;

        $updateP = User::find($id);
        $updateP->user_email = $email;
        if($pass!=""){
            $updateP->user_password  = sha1($pass);
        }
        $updateP->user_nama = $nama;
        $updateP->user_notelp  = $phone;
        if ($req->hasFile('foto')) {
            $foto =  $req->foto->store('profile-pict', 'public');
            $updateP->user_photo = $foto;
        } else {
            $foto = null;
        }
        $updateP->save();
        $req->session()->put('aktif_user',$updateP);

        if($updateP->user_tipe==0){
            return redirect("/homeseller")->with('update','Berhasil Update Profil');
        }else{
            return redirect("/homecustomer")->with('update','Berhasil Update Profil');
        }


    }

    public function viewAddApartment(Request $req)
    {

        $allKategori = Kategori::all();
        $allTipeApartment = Tipe_apartment::all();
        $allNegara = Negara::all();
        $allKota = Kota::all();

        $aktif_user = $req->session()->get("aktif_user");
        return view("Seller.addApartment", [
            "aktif_user" => $aktif_user,
            "allKategori" => $allKategori,
            "allTipeApartment" => $allTipeApartment,
            "allNegara" => $allNegara,
            "allKota" => $allKota
        ]);
    }

    public function GetKota(Request $req)
    {
        $idNegara = $req->negara;
        $allKota = Kota::all();
        $aktif_user = $req->session()->get("aktif_user");
        return view("Seller.getKota", [
            "aktif_user" => $aktif_user,
            "idNegara" => $idNegara,
            "allKota" => $allKota
        ]);
    }



    public function AddApartment(Request $req)
    {
        $user_id = $req->user_id;
        $tipe = $req->tipe;
        $kategori = $req->kategori;
        $negara = $req->negara;
        $kota = $req->kota;
        $nama = $req->nama;
        $harga = $req->harga;
        $alamat = $req->alamat;
        $deskripsi = $req->deskripsi;
        $tahun_bangun = $req->tahun_bangun;

        $req->validate([
            'foto' => 'mimes:png,jpg,jpeg,gif'
        ]);

        if ($req->hasFile('foto')) {
            $foto =  $req->foto->store('apart_photo', 'public');
        } else {
            $foto = null;
        }

        $apartment = new Apartment();
        $apartment->user_id = $user_id;
        $apartment->tipe_apartment_id = $tipe;
        $apartment->kategori_id  = $kategori;
        $apartment->negara_id  = $negara;
        $apartment->kota_id  = $kota;
        $apartment->apartment_nama = $nama;
        $apartment->apartment_harga = $harga;
        $apartment->apartment_alamat = $alamat;
        $apartment->apartment_deskripsi = $deskripsi;
        $apartment->apartment_rating = 0;
        $apartment->apartment_status = 0;
        $apartment->apartment_foto = $foto;
        $apartment->apartment_tahun_bangun = $tahun_bangun;
        $apartment->save();

        return redirect("/homeseller");
    }

    public function viewDetailApartment(Request $req)
    {
        $id = $req->session()->get("idApartment");
        $apartment = Apartment::find($id);
        $aktif_user = $req->session()->get("aktif_user");
        $allKategori = Kategori::all();
        $allTipeApartment = Tipe_apartment::all();
        $allNegara = Negara::all();
        $allKota = Kota::all();

        return view("Seller.detailApartment", [
            "aktif_user" => $aktif_user,
            "apartment" => $apartment,
            "allKategori" => $allKategori,
            "allTipeApartment" => $allTipeApartment,
            "allNegara" => $allNegara,
            "allKota" => $allKota
        ]);
    }

    public function DetailApartment(Request $req, $id)
    {
        $req->session()->put("idApartment", $id);
        return redirect("/viewdetailapartment");
    }

    public function UpdateApartment(Request $req)
    {
        $id = $req->session()->get("idApartment");

        $tipe = $req->tipe;
        $kategori = $req->kategori;
        $negara = $req->negara;
        $kota = $req->kota;
        $nama = $req->nama;
        $harga = $req->harga;
        $alamat = $req->alamat;
        $deskripsi = $req->deskripsi;
        $tahun_bangun = $req->tahun_bangun;

        $apartment = Apartment::find($id);
        $apartment->tipe_apartment_id = $tipe;
        $apartment->kategori_id  = $kategori;
        $apartment->negara_id  = $negara;
        $apartment->kota_id  = $kota;
        $apartment->apartment_nama = $nama;
        $apartment->apartment_harga = $harga;
        $apartment->apartment_alamat = $alamat;
        $apartment->apartment_deskripsi = $deskripsi;
        if ($req->hasFile('foto')) {
            $foto =  $req->foto->store('apart_photo', 'public');
            $apartment->apartment_foto = $foto;
        } else {
            $foto = null;
        }
        $apartment->apartment_tahun_bangun = $tahun_bangun;
        $apartment->save();
        return redirect("/homeseller");
    }

    public function DeleteApartment(Request $req, $id)
    {
        //status -1
        Apartment::where('apartment_id', $id)
            ->update([
                "apartment_status" => -1
            ]);

        $apartment = Apartment::find($id);


        if (file_exists(storage_path('app/public/' . $apartment->apartment_foto))) {
            unlink(storage_path('app/public/' . $apartment->apartment_foto));
        } else {
            dd('File does not exists.');
        }

        return redirect("/homeseller");
    }

    public function viewListOrder(Request $req)
    {
        $aktif_user = $req->session()->get("aktif_user");
        $allApartment = Apartment::all();
        $allTransaksi=DB::select('select * from apartment a,transaksi t where a.apartment_id=t.apartment_id');
        return view("Seller.listOrder", ["aktif_user" => $aktif_user, "allApartment" => $allApartment, "allTransaksi" => $allTransaksi]);
    }

    public function terimaTransaksi(Request $req, $id)
    {
        Transaksi::where('transaksi_id', $id)
            ->update([
                "transaksi_status" => 1
            ]);
        $transaksi = Transaksi::find($id);
        Apartment::where('apartment_id', $transaksi->apartment_id)
        ->update([
            "apartment_status" => 1
        ]);
        return redirect("/homeseller");
    }

    public function selesaiSewa(Request $req, $id)
    {
        Apartment::where('apartment_id', $id)
        ->update([
            "apartment_status" => 0
        ]);
        return redirect("/homeseller");
    }
}
