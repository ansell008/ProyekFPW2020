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
@endphp

@section('content')

<div class="luar">

    <div class="typography" style="margin-left: 45%">
        <h1>List Order</h1>
    </div>
    <br>
    <table class="table" id="listOrder">
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
            @foreach ($allTransaksi as $item)
                <tr>
                    <td>{{$ctr}}</td>
                    <td>{{$item->apartment_id}}</td>
                    <td>Rp @currency($item->transaksi_total_harga)</td>
                    <td>{{$item->created_at}}</td>
                    @if ($item->apartment_status == 1)
                        @if ($item->transaksi_status==0)
                            <td><span class="badge badge-success">Transaksi Selesai</span></td>
                        @else
                            <td><span class="badge badge-danger">Not Available</span></td>
                        @endif
                    @else
                        @if ($item->transaksi_status==0)
                            <td><span class="badge badge-success">Transaksi Selesai</span></td>
                        @else
                            <td><span class="badge badge-danger">Transaksi Belum Selesai</span></td>
                        @endif
                    @endif
                    <td>
                        @if (($item->transaksi_status == 0)||($item->apartment_status == 1))
                            <a type="button" class="btn genric-btn success radius disabled" href="#" >Accept</a>
                        @else
                            <a type="button" class="genric-btn success radius" href="/terimatransaksi/{{$item->transaksi_id}}">Accept</a>
                        @endif
                    </td>
                </tr>
                    @php
                        $ctr++;
                    @endphp
        @endforeach
        </tbody>
      </table>
</div>

<div style="float: none"></div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
            $('#listOrder').DataTable();
    });
</script>
@endsection






