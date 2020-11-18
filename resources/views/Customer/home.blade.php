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
<div class="luar">
    @isset($posting)
        @foreach ($posting as $p)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/hus/img/banana.jpg" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">{{$p->apartment_nama}}</h5>
              <p class="card-text">{{$p->user_nama}}</p>
                <a href="/detail/{{$p->apartment_id}}" class="btn btn-primary">More Detail</a>
            </div>
          </div>
        @endforeach
    @endisset



</div>


<div style="float: none"></div>
@endsection




