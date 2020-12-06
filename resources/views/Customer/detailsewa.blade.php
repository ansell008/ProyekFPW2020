
@extends('Include.layout')
@extends('Include.header2')
@extends('Include.footer')

@section('content')
<button  class="btn btn-secondary"><a href="/homecustomer">BACK</a></button>
<form action="/sewa" method="POST">
@csrf
<h1>{{$dipilih->apartment_nama}}</h1>
<img src="storage/{{$dipilih->apartment_foto}}" alt="" style="width: 500px;height:400px">
<h3>{{$dipilih->user_nama}}</h3>
<h5>{{$dipilih->apartment_harga}}</h5>
<div class="form-group" style="width: 100px;display:inline">

    <input type="date" name="selesai">
</div>
<input type="hidden" name="idap" value="{{$dipilih->apartment_id}}">
<input type="hidden" name="idus" value="{{$aktif_user->user_id}}">
<input type="hidden" name="harga" value="{{$dipilih->apartment_harga}}">
<button type="submit" class="btn btn-success">RENT</button>
</form>
<form action="/favorit" method="post">
    @csrf
    <input type="hidden" name="idap" value="{{$dipilih->apartment_id}}">
    <input type="hidden" name="idus" value="{{$aktif_user->user_id}}">
    <button type="submit" class="btn btn-danger">Add to favorites</button>
</form>


@endsection

