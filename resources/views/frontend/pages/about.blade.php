@extends('frontend.layouts.master')
@section('title', 'Home')
@push('css')
    <style>
        body {
            font-size: 15px;
            font-family: font-family: 'Rubik', sans-serif;;
        }
    </style>
@endpush
@section('content')


    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{asset('frontend/img/about.png')}}" data-natural-width="1400" data-natural-height="350">

        <div id="subheader">
            <div id="sub_content">
                <h1>About us</h1>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div class="container-fluid">
        <div class="row" style="height:500px;">
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features-content" style="height:500px;">
                    <h3>Our Story</h3>
                    <p>
                        Being thoughtful is a core belief that drives our business and our people every day. People are at the heart of everything we do. We realize our actions speak louder than our words. Subking has earned your trust in many ways, including trusting us in procuring clean food for your consumption and maintaining the highest levels of cleanliness, sanitation, and food safety. Many of our locations are now open for dine-in! We are conforming with local and state mandates by reducing our hours of operation and limiting dining room capacity. If you prefer to order food online for pick-up or delivery, you can still place a prepaid order on our app, via Subking.com or through any of our delivery partners. Please visit your local Subking’s Facebook page for more information.
                    </p>
                </div>
            </div>
            <div class="col-md-6 nopadding" >
                <div class="features">
                    <img src="{{asset('frontend/img/abt.jpg')}}" alt="" style="width: 100%;height:500px";>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="height:500px;">
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features">
                    <img src="{{asset('frontend/img/about/hamburger-horizontal-jpg-1523395905.jpg')}}" alt="" style="width: 100%;height:500px";>
                </div>
            </div>
            <div class="col-md-6 nopadding" >
                <div class="features-content" style="height:500px;">
                    <h3>Your Favorites, Our Chef's Touch</h3>
                    <p>
                        We really get cooking with our chef-created menu items, like our famous crispy fries and double-battered onion rings, which we proudly hand-cut ourselves before serving hot and crunchy with house made sauces. Other favorites include our made-in-house VegeFi (our own gourmet spin on a veggie burger), Wagyu beef hot dogs with all the fixings, frozen custard, and local craft beer and wine. Our Burger Sauce recipe alone uses more than a dozen fresh ingredients, and was crafted by our founding chef with flavors that perfectly complement our juicy, all-natural cheeseburger. You’ll find this level of pride and attention in everything we do. LEARN MORE about our commitment to excellence!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="height:500px;">
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features-content" style="height:500px;">
                    <h3>Our Beef is Beef</h3>
                    <p>
                        Our Angus beef is a part of the “Never-Ever” program, free-range, humanely-treated, and raised on vegetarian diets. It is never exposed to steroids, antibiotics, growth hormones, chemicals, or additives. Ever.
                    </p>
                </div>
            </div>
            <div class="col-md-6 nopadding" >
                <div class="features">
                    <img src="{{asset('frontend/img/abt.jpg')}}" alt="" style="width: 100%;height:500px";>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="height:500px;">
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features">
                    <img src="{{asset('frontend/img/about/IMG_5595-e1567107917105-768x822.jpg')}}" alt="" style="width: 100%;height:500px";>
                </div>
            </div>
            <div class="col-md-6 nopadding" >
                <div class="features-content" style="height:500px;">
                    <h3>Our Chicken Story</h3>
                    <p>
                        We only serve the highest quality of beef, and we don’t stop there. Our Chicken is sourced from family-owned Springer Mountain Farms. Cage-free. No Hormones or Antibiotics, ever. American Humane Certified.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="height:500px;">
            <div class="col-md-6 nopadding features-intro-img">
                <div class="features-content" style="height:500px;">
                    <h3>Keeping it Cool</h3>
                    <p>
                        Guests love our eye-catching, 10-foot fans, and it’s easy to see why. These fans keep Burger the perfect temperature.  The best part? Their environmentally conscious design means they consume 66% less energy. A smart fan that’s as eco-friendly as it is sleek? That’s pretty cool.
                    </p>
                </div>
            </div>
            <div class="col-md-6 nopadding" >
                <div class="features">
                    <img src="{{asset('frontend/img/about/Burger-Fan-768x512.jpg')}}" alt="" style="width: 100%;height:500px";>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="height:500px;">
            <div class="col-md-6 nopadding" >
                <div class="features-content" style="height:500px;">
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
                    <img src="{{asset('frontend/img/about/california_burger_516525.jpg')}}" alt="" style="width: 100%;height:500px";>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('js')


@endpush
