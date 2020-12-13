<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="pizza, delivery food, fast food, sushi, take away, chinese, italian food">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Subking  </title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('frontend/img/apple-touch-icon-57x57-precomposed.png')}}">
{{--    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">--}}
{{--    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">--}}
{{--    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">--}}

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- BASE CSS -->
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
    <link href="{{asset('frontend/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/menu.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/elegant_font/elegant_font.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/fontello/css/fontello.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/pop_up.css')}}" rel="stylesheet">
    <link href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Rubik&display=swap" rel="stylesheet">

    {{--toastr js--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


@stack('css')

    <style>
        html,
        body {
            height: 100%;
        }
    </style>
    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">


</head>

<body>

{{--<div id="preloader">--}}
{{--    <div class="sk-spinner sk-spinner-wave" id="status">--}}
{{--        <div class="sk-rect1"></div>--}}
{{--        <div class="sk-rect2"></div>--}}
{{--        <div class="sk-rect3"></div>--}}
{{--        <div class="sk-rect4"></div>--}}
{{--        <div class="sk-rect5"></div>--}}
{{--    </div>--}}
{{--</div><!-- End Preload -->--}}

<!-- Header ================================================== -->
@include('frontend.includes.header')
<!-- End Header =============================================== -->

<!-- SubHeader =============================================== -->
@yield('content')

<!-- Footer ================================================== -->

@include('frontend.includes.footer')

<!-- End Footer =============================================== -->

{{--<div class="layer"></div><!-- Mobile menu overlay mask -->--}}

{{--<!-- Login modal -->--}}
{{--<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content modal-popup">--}}
{{--            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>--}}
{{--            <form action="#" class="popup-form" id="myLogin">--}}
{{--                <div class="login_icon"><i class="icon_lock_alt"></i></div>--}}
{{--                <input type="text" class="form-control form-white" placeholder="Username">--}}
{{--                <input type="text" class="form-control form-white" placeholder="Password">--}}
{{--                <div class="text-left">--}}
{{--                    <a href="#">Forgot Password?</a>--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-submit">Submit</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div><!-- End modal -->--}}

{{--<!-- Register modal -->--}}
{{--<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content modal-popup">--}}
{{--            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>--}}
{{--            <form action="#" class="popup-form" id="myRegister">--}}
{{--                <div class="login_icon"><i class="icon_lock_alt"></i></div>--}}
{{--                <input type="text" class="form-control form-white" placeholder="Name">--}}
{{--                <input type="text" class="form-control form-white" placeholder="Last Name">--}}
{{--                <input type="email" class="form-control form-white" placeholder="Email">--}}
{{--                <input type="text" class="form-control form-white" placeholder="Password"  id="password1">--}}
{{--                <input type="text" class="form-control form-white" placeholder="Confirm password"  id="password2">--}}
{{--                <div id="pass-info" class="clearfix"></div>--}}
{{--                <div class="checkbox-holder text-left">--}}
{{--                    <div class="checkbox">--}}
{{--                        <input type="checkbox" value="accept_2" id="check_2" name="check_2" />--}}
{{--                        <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-submit">Register</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div><!-- End Register modal -->--}}

<!-- COMMON SCRIPTS -->
<script src="{{asset('frontend/js/jquery-2.2.4.min.js')}}"></script>
<!-- Modernizr -->
<script src="{{asset('frontend/js/modernizr.js')}}"></script>
<script src="{{asset('frontend/js/common_scripts_min.js')}}"></script>
<script src="{{asset('frontend/js/functions.js')}}"></script>
<script src="{{asset('frontend/assets/validate.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error )
    toastr.error('{{$error}}','Error',{
        closeButton:true,
        progressBar:true
    });
    @endforeach
    @endif
</script>

 @stack('js')
</body>
</html>
