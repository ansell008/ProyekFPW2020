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
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="luar">
    <div class="typography" style="margin-left: 45%" id="a">
        <h1>Detail Apartment</h1>
    </div>
    <br>
    <form action="/addapartment" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="typography">
            <h4>Apartment Name : </h4>
        </div>
        <div class="mt-10">
            <input type="text" name="nama" placeholder="Apartment Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apartment Name'" required="" class="single-input" value="{{$apartment->apartment_nama}}">
        </div>
        <br>
        <div class="typography">
            <h4>Category</h4>
        </div>
        <div class="default-select mt-10"  id="default-select" "="">
            <select style="display: none;" name="kategori">
                @foreach ($allKategori as $item)
                    @if ($item->kategori_id == $apartment->kategori_id)
                        <option value="{{$item->kategori_id}}">{{$item->kategori_nama}}</option>
                    @endif
                @endforeach
                @foreach ($allKategori as $item)
                    @if ($item->kategori_id != $apartment->kategori_id)
                        <option value="{{$item->kategori_id}}">{{$item->kategori_nama}}</option>
                    @endif
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
                    @if ($item->tipe_apartment_id == $apartment->tipe_apartment_id)
                        <option value="{{$item->tipe_apartment_id}}">{{$item->tipe_apartment_nama}}</option>
                    @endif
                @endforeach
                @foreach ($allTipeApartment as $item)
                    @if ($item->tipe_apartment_id != $apartment->tipe_apartment_id)
                        <option value="{{$item->tipe_apartment_id}}">{{$item->tipe_apartment_nama}}</option>
                    @endif
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
                        @if ($item->negara_id == $apartment->negara_id)
                            <option value="{{$item->negara_id}}">{{$item->negara_nama}}</option>
                        @endif
                    @endforeach
                    @foreach ($allNegara as $item)
                        @if ($item->negara_id != $apartment->negara_id)
                            <option value="{{$item->negara_id}}">{{$item->negara_nama}}</option>
                        @endif
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
            <div class="form-select" id="cbKota">
                <select style="display: none;" id="kota" name="kota">
                    @foreach ($allKota as $item)
                        @if ($item->kota_id == $apartment->kota_id)
                            <option value="{{$item->kota_id}}">{{$item->kota_nama}}</option>
                        @endif
                    @endforeach
                    @foreach ($allKota as $item)
                        @if ($item->kota_id != $apartment->kota_id && $item->negara_id ==  $apartment->negara_id)
                            <option value="{{$item->kota_id}}">{{$item->kota_nama}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="typography">
            <h4>Address</h4>
        </div>
        <div class="input-group-icon mt-10">
            <div class="icon"  style="margin-top: 11px;"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
        <input type="text" name="alamat" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required="" class="single-input" value="{{$apartment->apartment_alamat}}">
        </div>
        <br>
        <div class="typography">
            <h4>Price</h4>
        </div>
        <div class="mt-10">
            <input type="text" id="price" name="harga" data-a-sign="Rp. " min="1" placeholder="Price" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Price'" required="" class="single-input" value="{{$apartment->apartment_harga}}" >
        </div>
        <br>
        <div class="typography">
            <h4>Built Year</h4>
        </div>
        <div class="mt-10">
            <input type="number" name="tahun_bangun" name="build" min="1800" max="2021" placeholder="Build Year" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Build Year'" required="" class="single-input" value="{{$apartment->apartment_tahun_bangun}}">
        </div>
        <br>
        <div class="typography">
            <h4>Select Photo</h4>
        </div>
        <div class="mt-10">
        <img src="storage/{{$apartment->apartment_foto}}" width="150px" height="150px" alt=""><br><br>
            <input type="file" id="foto" name="foto" placeholder="Apartment Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apartment Name'" required="" class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>Description</h4>
        </div>
        <div class="mt-10">
            <textarea id="deskripsi" name="deskripsi" class="single-textarea" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" required="" value=""></textarea>
        </div>
        <br>

        <input type="hidden" id="tempdesc" value="{{ $apartment->apartment_deskripsi }}">
        <input type="hidden" name="user_id" value="{{ $aktif_user->user_id }}">
        <button class="genric-btn info radius" type="submit">Update</button>
    </form>

</div>


<div style="float: none"></div>

@endsection

@section('script')

<script>

        $(document).ready(function () {
            var desc = $("#tempdesc").val();
            $("#deskripsi").val(desc);
            // $('#price').autoNumeric('init');
        });
        $("#negara").change(function () {
            var negara = $("#negara").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            // alert(_token)
            $.ajax({
          		type: 'POST',
              	url: "/getkota",
              	data: {
                    negara: negara,
                    _token : _token
                      },
              	cache: false,
              	success: function(msg){
                    $("#tipe").html(msg);
                }
            });
        });



</script>
@endsection






