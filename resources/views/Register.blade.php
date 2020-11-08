@extends('Include.layout')
@extends('Include.header')
@extends('Include.footer')

@section('content')
<style>
    .register{
        background-image: url("regis.jpg");

    }
</style>
    <div class="register">
        <div class="container" style="padding: 100px;">
            <div class="row">
                <div class="col-lg-5">
                    <h3 class="mb-30" style="color: white">Register</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {{$error}} <br>
                            @endforeach
                        </div>
                    @endif
                    @if (session()->has("msg"))
                        <div class="alert alert-danger" role="alert">
                            <b>{{session("msg")}}</b>
                        </div>
                    @endif
                    @if (session()->has("yes"))
                        <div class="alert alert-success" role="alert">
                            <b>{{session("yes")}}</b>
                        </div>
                    @endif
                    <form action="/register" method="post">
                        @csrf
                        <div class="mt-10">
                        <input  value="{{old('nama')}}" type="text" name="nama" placeholder="Full Name"  required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input value="{{old('email')}}" type="text" name="email" placeholder="Email" required class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="password" placeholder="Password"  required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="confpass" placeholder="Confirm Password" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input value="{{old('notelp')}}" type="text" name="notelp" placeholder="Phone Number" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <div class="form-select">
                                <select style="display: none;" name="tipe">
                                    <option value="1">Customer</option>
                                    <option value="0">Seller</option>
                                </select>
                            </div>
                        </div><br>
                        <button type="submit" style="width: 100%" class="genric-btn danger e-large">REGISTER</button>
                    </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>


@endsection
