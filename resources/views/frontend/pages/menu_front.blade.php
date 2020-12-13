@extends('frontend.layouts.master')
@section('title', 'Menu')
@push('css')
    <style>
        .navbar-form input, .form-inline input {
            width:auto;
        }

        #nav{
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            position: absolute;
            overflow: hidden;
            background-color: white;
        }

        #nav.affix {
            position: fixed;
            top: 80px;
            width: 100%;
            z-index:10;
        }
        body {
            font-family: font-family: 'Rubik', sans-serif;
        }

    </style>
@endpush
@push('js')


@endpush
@section('content')


    <section class="masthead" style="height: 200px;margin-top: 100px;margin-bottom: 50px;">
        <div class="container" style="text-align: center">
            <img src="{{asset('frontend/img/subking-logo.png')}}" alt="" width="150" height="60" style="margin-bottom: 0px;">
            <h1 style="margin-bottom: 40px;">Place an Order Online</h1>
            <a href="{{route('menu')}}">  <div class="btn_1" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold"> Order Now</div></a>
        </div>
    </section>


    <!-- Begin Navbar -->
            <div class="container-fluid " >
                <div class="row" style="border-top: 1px #c1c0c0 solid;border-bottom: 1px #c1c0c0 solid;margin-top: 20px;">
                    <div class="col-md-12 text-center" style="padding: 20px;">
{{--                        <p>p</p>--}}
                        <a href="#subs" class="" style="margin:0px 40px;font-size: 19px;font-weight: bold;">SUBS</a>
                        <a href="#burgers" class="" style="margin:0px 40px;font-size: 19px;font-weight: bold;">BURGERS</a>
                        <a href="#sides" class="" style="margin:0px 40px;font-size: 19px;font-weight: bold;">SIDES</a>
                        <a href="#kids" class="" style="margin:0px 40px;font-size: 19px;font-weight: bold;">KIDS MENU</a>
                    </div>
                </div>
                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
{{--                <a href="#" class="navbar-brand">Subs</a>--}}
{{--                <a href="#" class="navbar-brand">Burgers</a>--}}
{{--                <a href="#" class="navbar-brand">Sides</a>--}}
{{--                <a href="#" class="navbar-brand">Kids Menu</a>--}}
            </div>


    <div class="container-fluid" style="background-color: #FFFFFF;" id="subs">
        <div class="row" style="margin-top: 30px;margin-bottom: 25px;">
            <div class="col-md-12 text-center" >
                <h1 style="color: #0c0c0c;font-size: 42px;font-weight: bold;">Subs</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 70px;padding: 0px 80px;">
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/img/home/1382541460839.jpeg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking Cheeseburger</h2>
                <p>Double Natural Angus Beef, Double American Cheese, Lettuce, Tomato, Subking Sauce
                   *Available as Single Burger</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/img/home/20150702-sous-vide-hamburger-anova-primary-1500x1125.jpg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking Cheeseburger</h2>
                <p>Double Natural Angus Beef, Double American Cheese, Lettuce, Tomato, Subking Sauce
                   *Available as Single Burger</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/img/home/1200px-RedDot_Burger.jpg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking Cheeseburger</h2>
                <p>Double Natural Angus Beef, Double American Cheese, Lettuce, Tomato, Subking Sauce
                   *Available as Single Burger</p>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #FFFFFF;" id="burgers">
        <div class="row" style="margin-bottom: 25px;">
            <div class="col-md-12 text-center">
                <h1 style="color: #0c0c0c;font-size: 42px;font-weight: bold;">Burgers</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 70px;padding: 0px 80px;">
            <div class="col-md-4 text-center">

                <img src="{{asset('frontend/img/home/1382541460839.jpeg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking CHEESEBURGER</h2>
                <p>Double Natural Angus Beef, Double American Cheese, Lettuce, Tomato, Subking Sauce
                   *Available as Single Burger</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/img/home/20150702-sous-vide-hamburger-anova-primary-1500x1125.jpg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking BURGER</h2>
                <p>Double Natural Angus Beef, Lettuce, Tomato, Subking Sauce
                   *Available as Single Burger</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/img/home/1200px-RedDot_Burger.jpg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking BACON CHEESEBURGER</h2>
                <p>Double Natural Angus Beef, Double American Cheese, Double Bacon
                   *Available as Single Burger and without Cheese</p>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #FFFFFF;" id="sides">
        <div class="row" style="margin-bottom: 25px;">
            <div class="col-md-12 text-center" >
                <h1 style="color: #0c0c0c;font-size: 42px;font-weight: bold;">Sides</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 70px;padding: 0px 80px;">
            <div class="col-md-4 text-center">

                <img src="{{asset('frontend/img/home/1382541460839.jpeg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking Cheeseburger</h2>
                <p>Double Natural Angus Beef, Double American Cheese, Lettuce, Tomato, Subking Sauce
                   *Available as Single Burger</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/img/home/20150702-sous-vide-hamburger-anova-primary-1500x1125.jpg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking Cheeseburger</h2>
                <p>Double Natural Angus Beef, Double American Cheese, Lettuce, Tomato, Subking Sauce
                   *Available as Single Burger</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/img/home/1200px-RedDot_Burger.jpg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking Cheeseburger</h2>
                <p>Double Natural Angus Beef, Double American Cheese, Lettuce, Tomato, Subking Sauce
                   *Available as Single Burger</p>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #FFFFFF;" id="kids">
        <div class="row" style="margin-bottom: 25px;">
            <div class="col-md-12 text-center" >
                <h1 style="color: #0c0c0c;font-size: 42px;font-weight: bold;">Kids Menu</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 70px;padding: 0px 80px;">
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/img/home/1382541460839.jpeg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">CHOICE OF ENTREE, SIDE + DRINK</h2>
                <p>Double Natural Angus Beef, Double American Cheese, Lettuce, Tomato, Subking Sauce
                   *Available as Single Burger</p>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #FFFFFF;">
        <div class="row" style="margin-top: 70px;">
            <div class="col-md-12 text-center" >
                <h1 style="color: #0c0c0c;font-size: 42px;font-weight: bold;">ALLERGEN INFORMATION & PEANUT OIL WARNING</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 70px;">
            <div class="col-md-12 text-center">
                <p>Subking restaurants use a highly-refined peanut oil it in its cooking process. While the FDA exempts this type of oil from being labeled as an allergen, we cannot assure its safety to those who are allergic to peanuts. Please check with your doctor before consuming peanut oil of any kind. Some Subking restaurants may use cottonseed oil instead of peanut oil. Check with your cashier before ordering if you have any allergies. If you have a food allergy, please click here to view a PDF of our Allergen Guideto refer to our allergen information prior to ordering. Peanuts, nuts and other food allergens may be present at Subking.</p>
                <h3 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">NUTRITIONAL INFORMATION</h3>
{{--                <h6>Please click here to view a PDF of our Nutritional Infoto find our nutritional content for our menu items.</h6>--}}
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script>
        $('#nav').affix({
            offset: {
                top: $('header').height()
            }
        });
    </script>
@endpush

