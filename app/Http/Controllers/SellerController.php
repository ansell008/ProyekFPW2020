<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Kategori;
use App\Kota;
use App\Negara;
use App\Tipe_apartment;
use App\User;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    public function index(Request $req)
    {
        $allApartment = Apartment::all();
        $allUser = User::all();
        $aktif_user = $req->session()->get("aktif_user");

        return view("Seller.home", ["aktif_user" => $aktif_user, "allApartment" => $allApartment, "allUser" => $allUser]);
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
