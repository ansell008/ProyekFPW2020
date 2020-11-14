<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    protected $table = 'negara';
    protected $primaryKey = "negara_id";
    public $timestamps = true;
}
