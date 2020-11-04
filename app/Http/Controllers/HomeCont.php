<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCont extends Controller
{
    public function index()
    {
        return view("home");
    }
}
