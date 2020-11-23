@extends('Include.layout')
@extends('Include.filter')
@extends('Include.footer')

<style>
    .luar{
        width: 100%;
        height: 1100px;
        max-height: 1200px;
        overflow: scroll;
        background-color: aliceblue;
        display: block;
        padding: 5%;
    }
    .card{
        display: inline;
        float: left;
        margin: 1.5%;
        left:60px;
        background-color:navy;
    }
    .card-img-top{
        width: 7cm;
        height: 5cm;
    }
    .cb{
        float: none;
    }

    #listApart_filter{
        float: right;
    }
</style>

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="luar">
    <div class="typography" style="margin-left: 45%">
        <h1>Edit Profile</h1>
    </div>
    <br>
    <form action="/editProfile" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="typography">
            <h4>Profile Picture</h4>
        </div>
        <div class="mt-10">
            <img src="storage/{{$aktif_user->user_photo}}" width="150px" height="150px" alt=""><br><br>
            <input type="file" id="foto" name="foto"  class="single-input">
        </div><br>
        <div class="typography">
            <h4>Email : </h4>
        </div>
        <div class="mt-10">
            <input type="text" name="email"  value="{{$aktif_user->user_email}}" required="" class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>New Password : </h4>
        </div>
        <div class="mt-10">
            <input type="text" placeholder="Enter New Password" name="password"  value=""  class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>Nama</h4>
        </div>
        <div class="mt-10">
            <input type="text" name="nama" value="{{$aktif_user->user_nama}}" required="" class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>Phone Number</h4>
        </div>
        <div class="mt-10">
            <input type="text" name="phone" value="{{$aktif_user->user_notelp}}" required="" class="single-input" >
        </div>
        <br>

        <button class="genric-btn info radius" type="submit">Submit</button>
    </form>

</div>


<div style="float: none"></div>

@endsection

@section('script')

@endsection






