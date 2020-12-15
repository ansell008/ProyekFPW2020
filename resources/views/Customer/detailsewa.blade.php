
@extends('Include.layout')
@extends('Include.header2')
@extends('Include.footer')

@section('content')

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
</style>

<div class="luar" style="text-align: center">
    <button  class="btn btn-secondary"><a href="/homecustomer">BACK</a></button>
    <form action="/sewa" method="POST">
    @csrf
    <h1>{{$dipilih->apartment_nama}}</h1>
    <img src="storage/{{$dipilih->apartment_foto}}" alt="" style="width: 500px;height:400px">
    <h3>{{$dipilih->user_nama}}</h3>

    <h2>Located at: {{$dipilih->apartment_alamat}}</h2>

    <h4><b>since: {{$dipilih->apartment_tahun_bangun}}</b></h4>
    <h5>{{$dipilih->apartment_harga}}</h5>
    <div class="form-group" style="width: 100px;display:inline">

        <input type="date" name="selesai">
    </div>
    <input type="hidden" name="idap" value="{{$dipilih->apartment_id}}">
    <input type="hidden" name="idus" value="{{$aktif_user->user_id}}">
    <input type="hidden" name="harga" value="{{$dipilih->apartment_harga}}">
    <button type="submit" class="btn btn-success">RENT</button>
    </form>
    <br>
    <br>
    <div style="height: 2px;background-color:black"></div>
    <h3>POST BY: </h3>
    <h5>{{$dipilih->user_nama}}</h5>
    <h5>{{$dipilih->user_email}}</h5>
    <h5>{{$dipilih->user_notelp}}</h5>
    <h5>Rating: {{$dipilih->apaartment_rating}}</h5>
    <h3>Review</h3>
    @isset($review)
    <div class="list-group">
        @foreach ($review as $r)
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">{{$r->user_nama}}</h5>
              <small>{{$r->user_email}}</small>
            </div>
            <p class="mb-1" style="text-align: left">{{$r->review_isi}}</p>

          </a>
        @endforeach



      </div>
    @endisset
    <br><br>
    <form action="/favorit" method="post">
        @csrf
        <input type="hidden" name="idap" value="{{$dipilih->apartment_id}}">
        <input type="hidden" name="idus" value="{{$aktif_user->user_id}}">
        <button type="submit" class="btn btn-danger">Add to favorites</button>
    </form>

</div>


@endsection

