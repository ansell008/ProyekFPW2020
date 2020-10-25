<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAction extends Controller
{
    //
    public function index()
    {
        return view('Index');
    }
    public function goToRegister(){
        return view('Register');
    }
    public function goToLogin(){
        return view('Login');
    }
}
