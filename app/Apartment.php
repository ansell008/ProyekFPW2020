<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartment';
    protected $primaryKey = "apartment_id";
    // protected $fillable = [
    //     'apartment_id',
    //     'user_id',
    //     'tipe_apartment_id',
    //     'kategori_id',
    //     'negara_id',
    //     'kota_id',
    //     'apartment_nama',
    //     'apartment_alamat',
    //     'apartment_harga',
    //     'apartment_harga',
    // ];
    public $timestamps = true;
}
