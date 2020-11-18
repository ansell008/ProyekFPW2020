@extends('Include.layout')
@extends('Include.header2')
@extends('Include.footer')


@section('content')
<h1>{{$dipilih->apartment_nama}}</h1>
<img src="/hus/img/banana.jpg" alt="" style="width: 500px;height:400px">
<h3>{{$dipilih->user_nama}}</h3>
<button type="/homecustomer" class="btn btn-secondary">Back</button>
@endsection
s
