@extends('Include.layout')
@extends('Include.header')
@extends('Include.footer')

@section('content')
<style>
    .register{
        background-image: url("regis.jpg");

    }
</style>
    <div class="register">
        <div class="container" style="padding: 100px;">
            <div class="row">
                <div class="col-lg-5">
                    <h3 class="mb-30" style="color: white">Register</h3>
                    <form action="#" method="post">
                        <div class="mt-10">
                            <input type="text" name="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="confpass" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" class="single-input">
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                            <input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required="" class="single-input">
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                            <div class="form-select" id="default-select" "="">
                                        <select style="display: none;">
                                            <option value=" 1">City</option>
                                <option value="1">Dhaka</option>
                                <option value="1">Dilli</option>
                                <option value="1">Newyork</option>
                                <option value="1">Islamabad</option>
                                </select><div class="nice-select" tabindex="0"><span class="current">City</span><ul class="list"><li data-value=" 1" class="option selected">City</li><li data-value="1" class="option">Dhaka</li><li data-value="1" class="option">Dilli</li><li data-value="1" class="option">Newyork</li><li data-value="1" class="option">Islamabad</li></ul></div>
                            </div>
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                            <div class="form-select" id="default-select" "="">
                                        <select style="display: none;">
                                            <option value=" 1">Country</option>
                                <option value="1">Bangladesh</option>
                                <option value="1">India</option>
                                <option value="1">England</option>
                                <option value="1">Srilanka</option>
                                </select><div class="nice-select" tabindex="0"><span class="current">Country</span><ul class="list"><li data-value=" 1" class="option selected">Country</li><li data-value="1" class="option">Bangladesh</li><li data-value="1" class="option">India</li><li data-value="1" class="option">England</li><li data-value="1" class="option">Srilanka</li></ul></div>
                            </div>
                        </div><br>
                        <button type="submit" style="width: 100%" class="genric-btn danger e-large">REGISTER</button>
                    </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>


@endsection
