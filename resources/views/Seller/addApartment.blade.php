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

/* COBA */
#imgView{
    padding:5px;
}
.loadAnimate{
    animation:setAnimate ease 2.5s infinite;
}
@keyframes setAnimate{
    0%  {color: #000;}
    50% {color: transparent;}
    99% {color: transparent;}
    100%{color: #000;}
}
.custom-file-label{
    cursor:pointer;
}

</style>

@php
    $ctr = 0;
@endphp
@foreach ($allKota as $item)
@if ($item->negara_id == 1)
    @php
        if($ctr == 0){
            $current = $item->kota_nama;
        }
        $ctr++;
    @endphp
@endif
@endforeach

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="luar">
    <div class="typography" style="margin-left: 45%">
        <h1>Add Apartment</h1>
    </div>
    <br>
    <form action="/addapartment" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="typography">
            <h4>Apartment Name : </h4>
        </div>
        <div class="mt-10">
            <input type="text" name="nama" placeholder="Apartment Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apartment Name'" required="" class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>Category</h4>
        </div>
        <div class="default-select mt-10"  id="default-select" "="">
            <select style="display: none;" name="kategori">
                @foreach ($allKategori as $item)
                    <option value="{{$item->kategori_id}}">{{$item->kategori_nama}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="typography">
            <h4>Type Apartment</h4>
        </div>
        <div class="default-select mt-10"  id="default-select" "="">
            <select style="display: none;" id="tipe" name="tipe">
                @foreach ($allTipeApartment as $item)
                    <option value="{{$item->tipe_apartment_id}}">{{$item->tipe_apartment_nama}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="typography">
            <h4>Country</h4>
        </div>
        <div class="input-group-icon mt-10">
            <div class="icon" style="margin-top: 11px;"><i class="fa fa-globe" aria-hidden="true"></i></div>
            <div class="form-select" id="default-select" "="">
                <select style="display: none;" id="negara" name="negara">
                    @foreach ($allNegara as $item)
                        <option value="{{$item->negara_id}}">{{$item->negara_nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="typography">
            <h4>City</h4>
        </div>
        <div class="input-group-icon mt-10">
            <div class="icon" style="margin-top: 11px;"><i class="fa fa-plane" aria-hidden="true"></i></div>
            <div class="form-select" id="kota">
                <select style="display: none;" name="kota">
                    @foreach ($allKota as $item)
                        @if ($item->negara_id == 1)
                            <option value="{{$item->kota_id}}">{{$item->kota_nama}}</option>
                        @endif
                    @endforeach
                </select>
                <div class="nice-select" tabindex="0">
                    <span class="current">{{$current}}</span>
                    <ul class="list">
                        @foreach ($allKota as $item)
                            @if ($item->negara_id == 1)
                                <li data-value="{{$item->kota_id}}" class="option">{{$item->kota_nama}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <div class="typography">
            <h4>Address</h4>
        </div>
        <div class="input-group-icon mt-10">
            <div class="icon"  style="margin-top: 11px;"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
            <input type="text" name="alamat" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required="" class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>Price</h4>
        </div>
        <div class="mt-10">
            <input type="text" id="price" name="harga" placeholder="Price" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Price'" required="" class="single-input" >
        </div>
        <br>
        <div class="typography">
            <h4>Built Year</h4>
        </div>
        <div class="mt-10">
            <input type="number" name="tahun_bangun" name="build" min="1800" max="2021" placeholder="Build Year" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Build Year'" required="" class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>Select Photo</h4>
        </div>
        <div class="mt-10">
            <div class="imgWrap" style="width: 300px; height: 300px;">
                <img src="no-image.png" id="imgView" class="card-img-top img-fluid" >
            </div>
            <div class="custom-file">
                <input type="file" name="foto" id="inputFile"  placeholder="Apartment Name" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputFile">Choose file</label>
            </div>
        </div>
        <br>
        <div class="typography">
            <h4>Description</h4>
        </div>
        <div class="mt-10">
            <textarea name="deskripsi" class="single-textarea" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" required=""></textarea>
        </div>
        <br>
        <input type="hidden" name="user_id" value="{{ $aktif_user->user_id }}">
        <button class="genric-btn info radius" type="submit">Add</button>
    </form>

</div>


<div style="float: none"></div>

@endsection

@section('script')
<script>
        $(document).ready(function () {
            // $('#price').autoNumeric('init');
        });
        $("#negara").change(function () {
            var negara = $("#negara").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
          		type: 'POST',
              	url: "/getkota",
              	data: {
                    negara: negara,
                    _token : _token
                      },
              	cache: false,
              	success: function(msg){
                    // alert(msg);
                    $("#kota").html(msg);
                }
            });
        });


        // cek
        $("#inputFile").change(function(event) {
      fadeInAdd();
      getURL(this);
    });

    $("#inputFile").on('click',function(event){
      fadeInAdd();
    });

    function getURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#inputFile").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;
          $('#imgView').attr('src', e.target.result);
          $('#imgView').hide();
          $('#imgView').fadeIn(500);
          $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
      }
      $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd(){
      fadeInAlert();
    }
    function fadeInAlert(text){
      $(".alert").text(text).addClass("loadAnimate");
    }
</script>
@endsection






