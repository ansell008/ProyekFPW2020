<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = "kategori_id";
    public $timestamps = true;

    public function getAllKategori()
    {
        $res = Kategori::all();
        return $res;
    }
}
