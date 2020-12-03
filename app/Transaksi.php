<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = "transaksi_id";
    protected $fillable = [
        'user_id',
        'apartment_id',
        'transaksi_status',
        'transaksi_tanggal_beli',
        'transaksi_tanggal_selesai',
        'transaksi_total_harga',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
