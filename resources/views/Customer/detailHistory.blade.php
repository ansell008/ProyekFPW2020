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
{{-- @php
    dd(session()->get("review"));
@endphp --}}
@if (session()->get("review")!=null)
    <div class="" style="text-align: center;background-color:green"><b style="color: white">{{session("review")}}</b></div>
    <br>
@endif
<div class="luar">

    <button  class="btn btn-secondary"><a href="/halamanHistory">BACK</a></button>
    {{-- <form action="/beli" method="POST">
    @csrf --}}
    <center>
        <h1>{{$transaksi->apartTransaksi->apartment_nama}}</h1>
        <img src="storage/{{$transaksi->apartTransaksi->apartment_foto}}" alt="" style="width: 500px;height:400px">
        <div class="desc">
            @php
                $date = date_create($transaksi->transaksi_tanggal_beli);
                $date_return = date_create($transaksi->transaksi_tanggal_selesai);
            @endphp
            <br>
            <b>Lokasi Apartment : </b>{{$transaksi->apartTransaksi->apartment_alamat}} <br>
            <b>Tahun Bangun Apartment : </b>{{$transaksi->apartTransaksi->apartment_tahun_bangun}} <br>
            <b>Tanggal Transaksi : </b> {{date_format($date,"d-m-Y")}}
            <br>
            @if ($transaksi->apartTransaksi->apartment_status==1)
                <b>Tanggal Selesai : </b> {{date_format($date_return,"d-m-Y")}}
            @endif
            <br>
            <b>Total Harga : </b>Rp @currency($transaksi->transaksi_total_harga) <br>

        </div>

    </center>
<br><hr>
@if ($counts[0]->jum=="0")
    <div class="section-top-border">

        <div class="row">

            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            {{$error}} <br>
                        @endforeach
                    </div>
                @endif
                <form action="/review/{{$transaksi->apartment_id}}" method="post">
                    @csrf
                    Review : <textarea class="single-input" name="review" name="review" id="" placeholder="Send messages"></textarea><br>
                    Rating : <input type="number" class="single-input" name="rating" id="" placeholder="1-5"><br>
                    <button type="submit" class=" btn btn-info float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endif



</div>



@endsection

