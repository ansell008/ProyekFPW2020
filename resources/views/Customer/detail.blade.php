
@extends('Include.layout')
@extends('Include.header2')
@extends('Include.footer')

@section('content')
<button type="/homecustomer" class="btn btn-secondary">Back</button>
<form action="/beli" method="POST">
@csrf
<h1>{{$dipilih->apartment_nama}}</h1>
<img src="storage/{{$dipilih->apartment_foto}}" alt="" style="width: 500px;height:400px">
<h3>{{$dipilih->user_nama}}</h3>
<h5>{{$dipilih->apartment_harga}}</h5>
<div class="form-group" style="width: 100px;display:inline">

    <select class="form-control" id="exampleFormControlSelect1" name="tipe">

        <option value=1>Beli</option>

        <option value=2>Sewa</option>

    </select>
</div>
<input type="hidden" name="idap" value="{{$dipilih->apartment_id}}">
<input type="hidden" name="idus" value="{{$aktif_user->user_id}}">
<input type="hidden" name="harga" value="{{$dipilih->apartment_harga}}">
<button type="submit" class="btn btn-success">BUY/RENT</button>
</form>


@endsection

