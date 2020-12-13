@extends('frontend.layouts.master')
@section('title', 'Home')
@push('css')

@endpush
@section('content')
    <section class="header-video container-top">
        <div id="hero_video">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div id="sub_content" style="text-align: left;padding: 0px;">
                        <h1 style="font-weight:500">KING OF SUBS</h1>
                        <h2 style="font-weight:400; color:#fff">100% Fresh Food</h2>
                        
                        <a id="happy" class="btn btn-danger" style="padding: 14px 40px;background-color: #C58E33;border: 0px;color: #0c0c0c;font-weight: bold" href="{{Session::get('rid') ? route('menu') : route('map')}}">Order Now</a>

                        {{--<form method="post" action="list_page.html">
                            <div id="custom-search-input">
                                <div class="input-group">
                                    <input type="text" class=" search-query" placeholder="Your Address or postal code">
                                    <span class="input-group-btn">
                                <input type="submit" class="btn_search" value="submit">
                                </span>
                                </div>
                            </div>
                        </form>--}}
                    </div><!-- End sub_content -->
                </div>
            </div>
        </div>
        <img src="{{asset('frontend/img/video_fix.png')}}" alt="" class="header-video--media" data-video-src="" data-teaser-source="{{asset('frontend/video/intro')}}" data-provider="" data-video-width="1920" data-video-height="960">

        {{--        <video autoplay="true" loop="loop" muted="" id="teaser-video" class="teaser-video"><source src="{{asset('frontend/video/intro.mp4')}}" type="video/mp4"><source src="{{asset('frontend/video/intro.ogv')}}" type="video/ogg"></video>--}}
    </section><!-- End Header video -->

    <!-- End SubHeader ============================================ -->

    <!-- Content ================================================== -->
    {{--    <div class="container margin_60">--}}

    {{--        <div class="main_title">--}}
    {{--            <h2 class="nomargin_top" style="padding-top:0">How it works</h2>--}}
    {{--            <p>--}}
    {{--                Cum doctus civibus efficiantur in imperdiet deterruisset.--}}
    {{--            </p>--}}
    {{--        </div>--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-3">--}}
    {{--                <div class="box_home" id="one">--}}
    {{--                    <span>1</span>--}}
    {{--                    <h3>Search by address</h3>--}}
    {{--                    <p>--}}
    {{--                        Find all restaurants available in your zone.--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-3">--}}
    {{--                <div class="box_home" id="two">--}}
    {{--                    <span>2</span>--}}
    {{--                    <h3>Choose a restaurant</h3>--}}
    {{--                    <p>--}}
    {{--                        We have more than 1000s of menus online.--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-3">--}}
    {{--                <div class="box_home" id="three">--}}
    {{--                    <span>3</span>--}}
    {{--                    <h3>Pay by card or cash</h3>--}}
    {{--                    <p>--}}
    {{--                        It's quick, easy and totally secure.--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-3">--}}
    {{--                <div class="box_home" id="four">--}}
    {{--                    <span>4</span>--}}
    {{--                    <h3>Delivery or takeaway</h3>--}}
    {{--                    <p>--}}
    {{--                        You are lazy? Are you backing home?--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div><!-- End row -->--}}

    {{--        <div id="delivery_time" class="hidden-xs">--}}
    {{--            <strong><span>2</span><span>5</span></strong>--}}
    {{--            <h4>The minutes that usually takes to deliver!</h4>--}}
    {{--        </div>--}}
    {{--    </div><!-- End container -->--}}


    <div class="container-fluid">
        <div class="row" style="height:600px;">
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features-content" style="height:600px;">
                    <h3>Banana Churro Shake</h3>
                    <p>
                        Creamy vanilla custard hand-spun with real bananas, topped with caramel, and a warm, cinnamon sugar Churro.
                    </p>
                    {{--                    <p>--}}
                    {{--                        Per ea erant aeque corpora, an agam tibique nec. At recusabo expetendis vim. Tractatos principes mel te, dolor solet viderer usu ad.--}}
                    {{--                    </p>--}}
                    <a href="{{route('menu')}}">  <div class="btn_1" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold"> Order Now</div></a>
                </div>
            </div>
            <div class="col-md-6 nopadding" >
                <div class="features">
                    <img src="{{asset('frontend/img/home/ff6107-splendid-table-tehina-shakes-2panel.png')}}" alt="" style="width: 100%;height:600px";>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row" style="height:600px;">
            <div class="col-md-6 nopadding" >
                <div class="features">
                    <img src="{{asset('frontend/img/home/Print-Summer-Smash-Burger.jpg')}}" alt="" style="width: 100%;height:600px";>
                </div>
            </div>
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features-content" style="height:600px;">
                    <h3>$10 Burger & Fry Pairing</h3>
                    <p>
                        Try our hormone-free & antibiotic-free Subking Cheeseburger paired with Fresh-Cut Fries, made with only potatoes & salt, for $10.
                    </p>
                    {{--                        <p>--}}
                    {{--                            Per ea erant aeque corpora, an agam tibique nec. At recusabo expetendis vim. Tractatos principes mel te, dolor solet viderer usu ad.--}}
                    {{--                        </p>--}}
                    <a href="{{route('menu')}}">  <div class="btn_1" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold"> Order Now</div></a>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="height:600px;">
            <div class="col-md-6 nopadding features-intro-img ">
                <div class="features-content" style="height:600px;">
                    <h3>Subking Cares</h3>
                    <p>
                        Being thoughtful is a core belief that drives our business and our people every day. People are at the heart of everything we do. We realize our actions speak louder than our words. Subking has earned your trust in many ways, including trusting us in procuring clean food for your consumption and maintaining the highest levels of cleanliness, sanitation, and food safety. Many of our locations are now open for dine-in! We are conforming with local and state mandates by reducing our hours of operation and limiting dining room capacity. If you prefer to order food online for pick-up or delivery, you can still place a prepaid order on our app, via Subking.com or through any of our delivery partners. Please visit your local Subking’s Facebook page for more information.
                    </p>
                </div>
            </div>
            <div class="col-md-6 nopadding" >
                <div class="features">
                    <img src="{{asset('frontend/img/home/images.png')}}" alt="" style="width: 100%;height:600px";>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="height:600px;">
            <div class="col-md-6 nopadding" >
                <div class="features">
                    <img src="{{asset('frontend/img/home/1200px-RedDot_Burger.jpg')}}" alt="" style="width: 100%;height:600px";>
                </div>
            </div>
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features-content" style="height:600px;">
                    <h3>Best Burger Joint</h3>
                    <p>
                        Subking was awarded  "Best Burger Joint" by the 5th Annual Chain Reaction Report for our commitment to only serve responsibly raised beef.
                    </p>
                    {{--                    <a href="{{route('menu')}}">  <div class="btn_1" style="height: 55px;width: 175px;padding-top: 20px;:"> Order Now</div></a>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="height:600px;">
            <div class="col-md-6 nopadding" >
                <div class="features">
                    <div class="features-content" style="height:600px;">
                        <h3>Find Your Nearest Subking</h3>
                        <a href="{{route('menu')}}">  <div class="btn_1" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold"> Order Now</div></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 nopadding features-intro-img">
                <img src="{{asset('frontend/img/home/20150702-sous-vide-hamburger-anova-primary-1500x1125.jpg')}}" alt="" style="width: 100%;height:600px";>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #FFFFFF;">
        <div class="row" style="margin-top: 70px;">
            <div class="col-md-12 text-center" >
                <img src="{{asset('frontend/img/subking-logo.png')}}" alt="" width="150" height="60" style="margin-bottom: 15px;">
                <h4>Try Our Fans Favorites</h4>
                <h1 style="color: #0c0c0c;font-size: 42px;font-weight: bold;">Place an Order Online</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom: 70px;">
            <div class="col-md-4 text-center">

                <img src="{{asset('frontend/img/home/1382541460839.jpeg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking Cheeseburger</h2>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/img/home/20150702-sous-vide-hamburger-anova-primary-1500x1125.jpg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking Cheeseburger</h2>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('frontend/img/home/1200px-RedDot_Burger.jpg')}}" alt="" width="300" height="300">
                <h2 style="color: #0c0c0c;font-size: 32px;font-weight: bold;">Subking Cheeseburger</h2>
            </div>
            <div class="col-md-12 text-center" style="margin-top: 30px;">
                <a href="{{route('menu')}}">  <div class="btn_1" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold"> Order Now</div></a>
                <p style="font-size: 15px;margin-top: 10px;">Now delivering! Find a location near you.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="height:600px;">
            <div class="col-md-6 nopadding" >
                <div class="features">
                    <img src="{{asset('frontend/img/home/Tuna-Salad-Bagel.jpg')}}" alt="" style="width: 100%;height:600px";>
                </div>
            </div>
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features-content" style="height:600px;">
                    <h3>Your Favorites, Our Chef's Touch</h3>
                    <a href="{{route('about')}}">  <div class="btn_1" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold">Learn More</div></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="height:600px;">
            <div class="col-md-6 nopadding" >
                <div class="features-content" style="height:600px;">
                    <h3>Sign Up Now</h3>
                    <form action="{{route('email.club')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="country" required>
                                <option>India</option>
                                <option>Australia</option>
                            </select>
                        </div>
                        {{--<div class="btn_1" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold">Submit</div>--}}
                        <button class="btn_1" id="happy" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold">Submit</button>
                        <p style="margin-top: 10px;">By joining, you agree to our <a href = "">Terms & Conditions</a></p>
                    </form>

                </div>
            </div>
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features">
                    <img src="{{asset('frontend/img/home/exps28800_UG143377D12_18_1b_RMS.jpg')}}" alt="" style="width: 100%;height:600px";>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content =============================================== -->
    {{--    <div class="container margin_60">--}}
    {{--        <div class="main_title margin_mobile">--}}
    {{--            <h2 class="nomargin_top">Work with Us</h2>--}}
    {{--            <p>--}}
    {{--                Cum doctus civibus efficiantur in imperdiet deterruisset.--}}
    {{--            </p>--}}
    {{--        </div>--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-4 ">--}}
    {{--                <a class="box_work" >--}}
    {{--                    <img src="{{asset('frontend/img/subking.png')}}" width="848" height="480" alt="" class="img-responsive">--}}
    {{--                    <h3>Online Order<span>Subking Steak Bomb</span></h3>--}}
    {{--                    <p>Subking accept online order. We value your time and taste both. We ensure you enjoy every single bite of delicious Food. Busy and cannot make it to the restaurant but feeling hungry? No Worries just order from online, we will deliver your food.</p>--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-4">--}}
    {{--                <a class="box_work" >--}}
    {{--                    <img src="{{asset('frontend/img/sub.png')}}"  alt="" class="img-responsive">--}}
    {{--                    <h3>Rewards<span>Customer happiness our first priority</span></h3>--}}
    {{--                    <p>Subking Launch rewards program. Now each time you will order 400 or more , you will get 10 points rewards. Each point is Equivalent to 2 c. Redeem your rewards when .</p>--}}
    {{--                    --}}{{--                    <div class="btn_1">Read more</div>--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-4">--}}
    {{--                <a class="box_work">--}}
    {{--                    <img src="{{asset('frontend/img/subking2.png')}}" width="848" height="480" alt="" class="img-responsive">--}}
    {{--                    <h3>Order Over Phone<span>One of the Best Place To Eat</span></h3>--}}
    {{--                    <p>You can order over phone as well, Subking Food always welcome your call. You can pay on delivery.--}}
    {{--                        <br>Please call us @ 305 986 6697</p>--}}

    {{--                </a>--}}
    {{--            </div>--}}
    {{--        </div><!-- End row -->--}}
    {{--    </div><!-- End container -->--}}



@endsection
@push('js')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{asset('frontend/js/video_header.js')}}"></script>
    <script>
        $(document).ready(function() {
            'use strict';
            HeaderVideo.init({
                container: $('.header-video'),
                header: $('.header-video--media'),
                videoTrigger: $("#video-trigger"),
                autoPlayVideo: true
            });

        });
    </script>

@endpush
