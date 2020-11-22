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
                                <img src="hus/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
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
                                <div class="form-group" style="width: 100px;display:inline">

                                    <select class="form-control" id="exampleFormControlSelect1">
                                        @isset($negara)
                                        @foreach ($negara as $n)
                                        <option value="{{$n->negara_nama}}">{{$n->negara_nama}}</option>
                                        @endforeach

                                        @endisset
                                    </select>
                                  </div>

                                  <div class="form-group" style="width: 100px;display:inline;float: left;margin-left:10%">

                                    <select class="form-control" id="exampleFormControlSelect1">
                                        @isset($kota)
                                        @foreach ($kota as $k)
                                        <option value="{{$k->kota_nama}}">{{$k->kota_nama}}</option>
                                        @endforeach

                                        @endisset
                                    </select>
                                  </div>
                                <div style="float: none"></div>
                             <button type="button" class="btn btn-secondary" style="margin-left: 8%;margin-top:0.8%" >Search</button>

                                @endif

                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                        <div class="social_wrap d-flex align-items-center justify-content-end">
                            <div class="login_text">
                            <a href="" style="color: white">Hello, {{$aktif_user->user_nama}}</a>
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
