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
        <h1>Add Apartment</h1>
    </div>
    <br>
    <form action="#" method="POST">
        <div class="typography">
            <h4>Apartment Name : </h4>
        </div>
        <div class="mt-10">
            <input type="text" name="first_name" placeholder="Apartment Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apartment Name'" required="" class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>Category</h4>
        </div>
        <div class="default-select mt-10"  id="default-select" "="">
            <select style="display: none;">
                <option value=" 1">Jual</option>
                <option value=" 1">Sewa</option>
            </select>
        </div>
        <br>
        <div class="typography">
            <h4>Country</h4>
        </div>
        <div class="input-group-icon mt-10">
            <div class="icon" style="margin-top: 11px;"><i class="fa fa-globe" aria-hidden="true"></i></div>
            <div class="form-select" id="default-select" "="">
                <select style="display: none;">
                    <option value="1">Bangladesh</option>
                    <option value="1">India</option>
                    <option value="1">England</option>
                    <option value="1">Srilanka</option>
                </select>
            </div>
        </div>
        <br>
        <div class="typography">
            <h4>City</h4>
        </div>
        <div class="input-group-icon mt-10">
            <div class="icon" style="margin-top: 11px;"><i class="fa fa-plane" aria-hidden="true"></i></div>
            <div class="form-select" id="default-select" "="">
                <select style="display: none;">
                    <option value="1">Dhaka</option>
                    <option value="1">Dilli</option>
                    <option value="1">Newyork</option>
                    <option value="1">Islamabad</option>
                </select>
            </div>
        </div>
        <br>
        <div class="typography">
            <h4>Address</h4>
        </div>
        <div class="input-group-icon mt-10">
            <div class="icon"  style="margin-top: 11px;"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
            <input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required="" class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>Price</h4>
        </div>
        <div class="mt-10">
            <input type="number" name="first_name" placeholder="Price" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Price'" required="" class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>Select Foto</h4>
        </div>
        <div class="mt-10">
            <input type="file" name="first_name" placeholder="Apartment Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apartment Name'" required="" class="single-input">
        </div>
        <br>
        <div class="typography">
            <h4>Description</h4>
        </div>
        <div class="mt-10">
            <textarea class="single-textarea" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" required=""></textarea>
        </div>
        <button class="genric-btn info radius" type="submit">Add</button>
    </form>

</div>


<div style="float: none"></div>

@endsection

@section('script')
<script>

</script>
@endsection






