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

@php
    $ctr = 1;
    if ($transaksi>0)
    {
        $message = "Terdapat $transaksi Transaksi Yang Perlu Diterima";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
@endphp

@section('content')
@if (session()->has("update"))
<div class="" style="text-align: center;background-color:green"><b style="color: white">{{session("update")}}</b></div>
     <br>
@endif

<div class="luar">
    <div class="typography" style="margin-left: 45%">
        <h1>List Apartment</h1>
    </div>
    <br>
    <table class="table" id="listApart">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NAMA</th>
            <th scope="col">HARGA</th>
            <th scope="col">DIPOST TANGGAL</th>
            <th scope="col">STATUS</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($allApartment as $item)
                @if ($item->user_id == $aktif_user->user_id)
                    @if ($item->apartment_status != -1)
                        <tr>
                            <td>{{$ctr}}</td>
                            <td>{{$item->apartment_nama}}</td>
                            <td>Rp @currency($item->apartment_harga)</td>
                            <td>{{$item->created_at}}</td>
                                @if ($item->apartment_status == 0)
                                    <td><span class="badge badge-success">Available</span></td>
                                @else
                                    @if ($item->kategori_id==1)
                                        <td><span class="badge badge-danger">Not Available</span></td>
                                    @else
                                        <td>
                                            <span class="badge badge-success">Not Available</span> <br>
                                            <a type="button" class="genric-btn danger radius" href="/selesaiSewa/{{$item->apaertment_id}}">Selesaikan Masa Sewa</a>
                                        </td>
                                    @endif
                                @endif
                            <td>
                                <a type="button" class="genric-btn success radius" href="/detailapartment/{{$item->apartment_id}}">Detail</a>
                                <a type="button" class="genric-btn danger radius" href="/deleteapartment/{{$item->apartment_id}}">Delete</a>
                            </td>
                        </tr>
                        @php
                            $ctr++;
                        @endphp
                    @endif
                @endif
            @endforeach
        </tbody>
      </table>
</div>


<div style="float: none"></div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
            $('#listApart').DataTable();
    });
</script>
@endsection






