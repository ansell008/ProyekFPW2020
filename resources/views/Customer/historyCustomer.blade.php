@extends('Include.layout')
@extends('Include.filter')
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

<div class="luar">
    <a href="/homecustomer" class="btn btn-secondary">Back</a> <br>
    <div class="typography" style="margin-left: 45%">
        <h1>List History Apartment</h1>
    </div>
    <br>
    <table class="table" id="listApart">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NAMA</th>
            <th scope="col">HARGA</th>
            <th scope="col">TANGGAL TRANSAKSI</th>
            <th scope="col">STATUS</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody>
            @php
                $ctr=1;
            @endphp
            @foreach ($allApartment as $item)
            @php
                $apart = $item->apartTransaksi;
            @endphp
                    <tr>
                        <td>{{$ctr}}</td>
                        <td>{{$apart['apartment_nama']}}</td>
                        <td>Rp @currency($item->transaksi_total_harga)</td>
                        <td>{{$item->transaksi_tanggal_beli}}</td>
                        @if ($item->transaksi_status == 1 || $item->transaksi_status == 2)
                            <td><span class="badge badge-success">Approved</span></td>
                        @else
                            <td><span class="badge badge-danger">Not Approved</span></td>
                        @endif
                        <td>
                            <a type="button" class="genric-btn success radius" href="/detailTransaksi/{{$item->transaksi_id}}">Detail</a>
                        </td>
                    </tr>
                        @php
                            $ctr++;
                        @endphp
            @endforeach
        </tbody>
      </table>
</div>

@endsection
