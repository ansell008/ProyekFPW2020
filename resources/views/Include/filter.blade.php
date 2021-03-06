@section('header')
<header>
    <link rel="stylesheet" href="hus/css/bootstrap.min.css">
    <link rel="stylesheet" href="hus/css/owl.carousel.min.css">
    <link rel="stylesheet" href="hus/css/magnific-popup.css">
    <link rel="stylesheet" href="hus/css/font-awesome.min.css">
    <link rel="stylesheet" href="hus/css/themify-icons.css">
    <link rel="stylesheet" href="hus/css/nice-select.css">
    <link rel="stylesheet" href="hus/css/flaticon.css">
    <link rel="stylesheet" href="hus/css/gijgo.css">
    <link rel="stylesheet" href="hus/css/animate.css">
    <link rel="stylesheet" href="hus/css/slick.css">
    <link rel="stylesheet" href="hus/css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="hus/css/style.css">

    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid p-0">
                <div class="row align-items-center no-gutters">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="/">
                                <img src="logo.png" alt="" style="width: 100px">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                @if ($aktif_user->user_tipe == 0)
                                    <ul id="navigation">
                                        <li><a href="/homeseller">List Apartment</a></li>
                                        <li><a href="/viewaddapartment">Add Apartment</a></li>
                                        <li><a href="/viewlistorder">List Order</a></li>
                                    </ul>
                                @else
                                    <style>
                                        .header-area .main-header-area .main-menu ul li{
                                            display: block;
                                        }
                                    </style>
                                    <form action="/ubahkota" method="POST">
                                        @csrf
                                        @if (isset($nn))
                                        <div class="form-group" style="width: 100px;display:inline">

                                            <select class="form-control" id="exampleFormControlSelect1" onchange="this.form.submit()" name="negaranya">
                                                @isset($negara)
                                                @foreach ($negara as $n)
                                                @if ($nn==$n->negara_id)
                                                <option value="{{$n->negara_id}}" selected="selected">{{$n->negara_nama}}</option>
                                                @else
                                                <option value="{{$n->negara_id}}">{{$n->negara_nama}}</option>
                                                @endif

                                                @endforeach

                                                @endisset
                                            </select>
                                        </div>
                                        @else
                                        <div class="form-group" style="width: 100px;display:inline">

                                            <select class="form-control" id="exampleFormControlSelect1" onchange="this.form.submit()" name="negaranya">
                                                @isset($negara)
                                                @foreach ($negara as $n)
                                                <option value="{{$n->negara_id}}">{{$n->negara_nama}}</option>
                                                @endforeach

                                                @endisset
                                            </select>
                                        </div>
                                        @endif

                                    </form>

                                <form action="/search" method="POST">
                                 @csrf
                                 @isset($nn)
                                <input type="hidden" name="country" value="{{$nn}}">
                                 @endisset
                                 <div class="form-group" style="width: 100px;display:inline;float: left;margin-left:10%">

                                    <select class="form-control" id="exampleFormControlSelect1" name="city">
                                        @isset($kota)
                                        @if (isset($kk))
                                        @foreach ($kota as $k)
                                        @if ($k->kota_id==$kk)
                                        <option value="{{$k->kota_id}}" selected="selected">{{$k->kota_nama}}</option>
                                        @else
                                        <option value="{{$k->kota_id}}">{{$k->kota_nama}}</option>
                                        @endif

                                        @endforeach
                                        @else
                                        @foreach ($kota as $k)
                                        <option value="{{$k->kota_id}}">{{$k->kota_nama}}</option>
                                        @endforeach
                                        @endif


                                        @endisset
                                    </select>
                                  </div>
                                <div style="float: none"></div>
                                <button type="submit" class="btn btn-secondary" style="margin-left: 8%;margin-top:0.8%" >Search</button>
                                </form>


                            @endif

                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                        <div class="social_wrap d-flex align-items-center justify-content-end">
                            <div class="login_text">
                            <img style="border-radius:50%" src="storage/{{$aktif_user->user_photo}}" width="50px" alt=""> &nbsp;&nbsp;
                            <a href="" style="color: white">Hello, {{$aktif_user->user_nama}}</a>
                            <a href="/editProfilePage">Edit Profil</a>
                            <a href="/LoginPage">Logout</a>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

@endsection
