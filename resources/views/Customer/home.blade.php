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
</style>
@section('content')
@if (session()->has("update"))
<div class="" style="text-align: center;background-color:green"><b style="color: white">{{session("update")}}</b></div>
     <br>
@endif
@if (session()->has("beli"))
<div class="" style="text-align: center;background-color:green"><b style="color: white">{{session("beli")}}</b></div>
     <br>
@endif
<div class="luar">
    <div class="satu" style="height: 500px; ">
        <h1 class="display-4">Recommended</h1>
        @isset($rekom)
        @foreach ($rekom as $p)
        @if ($p->apartment_status == 0)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="storage/{{$p->apartment_foto}}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">{{$p->apartment_nama}}</h5>
                <p class="card-text">{{$p->user_nama}}</p>
                    <a href="/detail/{{$p->apartment_id}}" class="btn btn-primary">More Detail</a>
                </div>
            </div>
        @endif
    @endforeach
        @endisset
    </div>
    <div class="dua" style="height: 500px">
        <h1 class="display-4">All</h1>
        @isset($posting)
            @foreach ($posting as $p)
                @if ($p->apartment_status == 0)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="storage/{{$p->apartment_foto}}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{$p->apartment_nama}}</h5>
                        <p class="card-text">{{$p->user_nama}}</p>
                            <a href="/detail/{{$p->apartment_id}}" class="btn btn-primary">More Detail</a>
                        </div>
                    </div>
                @endif
            @endforeach
        @endisset
    </div>
</div>


<div style="float: none"></div>
@endsection




