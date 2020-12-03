<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    protected $table = 'favorite';
    protected $primaryKey = "favorite_id";
    public $incrementing = true;
    protected $fillable = [
        'user_id',
        'apartment_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
