<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe_apartment extends Model
{
    protected $table = 'tipe_apartment';
    protected $primaryKey = "tipe_apartment_id";
    public $timestamps = true;

    public function getAllTipeApartment()
    {
        $res = Tipe_apartment::all();
        return $res;
    }
}
