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
                    <h3 class="mb-30" style="color: white">What's Up!</h3>
                    <form action="#" method="post">
                        <div class="mt-10">
                            <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" class="single-input">
                        </div>
                        <br>
                        <button type="submit" style="width: 100%" class="genric-btn danger e-large">LOGIN</button>
                    </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>


@endsection
