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
                    <td>
                        @foreach ($allUser as $user)
                            @if ($user->user_id == $item->user_id)
                                {{$user->user_nama}}
                            @endif
                        @endforeach</td>
                    <td>Rp @currency($item->transaksi_total_harga)</td>
                    <td>{{$item->created_at}}</td>

                        {{-- @if ($item->transaksi_status==1)
                            <td><span class="badge badge-success">Transaksi Selesai</span></td>
                        @else
                            <td><span class="badge badge-danger">Not Available</span></td>
                        @endif --}}

                        @if ($item->transaksi_status==1 || $item->transaksi_status==2)
                            <td><span class="badge badge-success">Transaksi Selesai</span></td>
                        @else
                            <td><span class="badge badge-danger">Transaksi Belum Selesai</span></td>
                        @endif

                    <td>
                        @if (($item->transaksi_status == 1))
                            @php
                                $sewa = false;
                            @endphp

                            @foreach ($allApartment as $apart)
                                @if ($apart->apartment_id == $item->apartment_id)
                                    @if ($apart->kategori_id == 2 && $apart->apartment_status == 1)
                                        @php
                                            $sewa = true;
                                        @endphp
                                    @endif
                                @endif
                            @endforeach

                            @if ($sewa == true)
                                <a type="button" class="genric-btn danger radius" href="/selesaiSewa/{{$item->transaksi_id}}/{{$item->apartment_id}}">Selesaikan Masa Sewa</a>
                            @else
                                <a type="button" class="btn genric-btn success radius disabled" href="#" >Accept</a>
                            @endif
                        @elseif(($item->transaksi_status == 2))
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






