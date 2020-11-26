
@extends('Include.layout')
@extends('Include.header')
@extends('Include.footer')

@section('content')
<button><a href="/homecustomer">Back</a></button>
<h1>{{$dipilih->apartment_nama}}</h1>
<img src="/storage/{{$dipilih->apartment_foto}}" alt="" style="width: 500px;height:400px">
<h3>{{$dipilih->user_nama}}</h3>
<button type="/homecustomer" class="btn btn-secondary">Back</button>
@endsection

