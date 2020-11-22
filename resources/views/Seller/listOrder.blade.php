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






