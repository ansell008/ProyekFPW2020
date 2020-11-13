<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserAction extends Controller
{
    //
    public function index()
    {
        return view('Index');
    }
    public function goToRegister()
    {
        return view('Register');
    }
    public function goToLogin()
    {
        return view('Login');
    }
    public function register(Request $req)
    {
        $validateData = $req->validate(
            [
                "email" => ['email:dns', 'unique:user,user_email'],
                "notelp" => ['numeric', 'digits_between:8,13']
            ],
            [
                "numeric" => "Phone Number must be number",
                "digits_between" => "Phone Number minimum 8 digits and maximum 13 digits"
            ]
        );
        if ($req->password == $req->confpass) {
            User::create([
                "user_email" => $validateData["email"],
                "user_password" => sha1($req->password),
                "user_nama" => $req->nama,
                "user_notelp" => $validateData["notelp"],
                "user_tipe" => $req->tipe,
                "user_photo" => "default_pic.png",
                "created_at" => time(),
                "updated_at" => time()
            ]);
            return redirect('/RegisterPage')->with('yes', 'Register Succeed');
        } else {
            return redirect('/RegisterPage')->with('msg', 'The Password and Confirm Password must match');
        }
    }

    public function login(Request $req)
    {
        $user = User::where("user_email", "=", $req->email)->where("user_password", "=", sha1($req->password))->first();
        if ($user == null) {
            return redirect('LoginPage')->with('msg', 'Invalid Email/ Password');
        } else {
            $req->session()->put('aktif_user', $user);
            if ($user->user_tipe == 0) {
                // masuk penjual
                return redirect('/homeseller');
            } else {
                // masuk customer
                return redirect('/homecustomer');
            }
        }
    }
}
