@extends('frontend.layouts.master')
@section('title', 'Faq')
@push('css')

@endpush
@section('content')


    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{asset('frontend/img/about.png')}}" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Faq</h1>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->
    <!-- Content ================================================== -->
{{--    <div class="container-fluid">--}}
{{--        <div class="row" style="height:600px;">--}}
{{--            <div class="col-md-6 nopadding" >--}}
{{--                <div class="features">--}}
{{--                    <div class="features-content" style="height:600px;">--}}
{{--                        <h3>Burger Rewards Program</h3>--}}
{{--                        <p>It's easy! Download the Burger App to earn points for ever visit. For every $1 spent, you receive 1 point. Once you reach 100 points, you receive $10 reward towards your next visit at Burger.</p>--}}
{{--                        <p>As a Burger Rewards member, you'll receive exclusive offers and promotions such as double point days, birthday rewards and more.</p>--}}
{{--                        <a href="{{route('menu')}}">  <div class="btn_1" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold">Download App</div></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 nopadding features-intro-img">--}}
{{--                <img src="{{asset('frontend/img/home/Print-Summer-Smash-Burger.jpg')}}" alt="" style="width: 100%;height:600px";>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-bottom: 50px">
                <h1>Frequently Asked Questions</h1>
            </div>

            <div class="col-md-3" id="sidebar">
{{--                <div class="theiaStickySidebar">--}}
{{--                    <div class="box_style_1" id="faq_box">--}}
{{--                        <ul id="cat_nav">--}}
{{--                            <li><a href="#payment" class="active">Payments</a></li>--}}
{{--                            <li><a href="#works">How it works</a></li>--}}
{{--                            <li><a href="#delay">Delivery delay</a></li>--}}
{{--                            <li><a href="#takeaway">Takeaway</a></li>--}}
{{--                            <li><a href="#preorder">Preorder</a></li>--}}
{{--                            <li><a href="#register_2">Register</a></li>--}}
{{--                            <li><a href="#pricing">Pricing</a></li>--}}
{{--                            <li><a href="#privacy">Privacy</a></li>--}}
{{--                        </ul>--}}
{{--                    </div><!-- End box_style_1 -->--}}
{{--                </div><!-- End theiaStickySidebar -->--}}
            </div><!-- End col-md-3 -->

            <div class="col-md-9">
                <div class="panel-group" id="payment">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseOne">Why do you use peanut oil?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                We use peanut oil for two reasons: because we’ve found it to be better-tasting to our guests, and because it’s healthier than other oils out there. Peanut oil contains antioxidants and good fats, and is naturally trans fat- and cholesterol-free.

                                The FDA does not list highly refined oils (such as peanut oil) as allergenic, because the proteins in the oil are stripped out during processing. With that said, we can never completely guarantee against any allergies.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseTwo">Where does your beef come from?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                Simply put, our certified American Angus beef comes from some of the best ranches in the world. We’re committed to being better through our “Never Ever Program,” which means our beef is never exposed to steroids, antibiotics, growth hormones, chemicals or additives. Ever. We work only with ranchers who share our belief that cattle should roam free and live a happy, relaxed life. All cattle is raised on natural feed like pasture grass, hay, grains and legumes before being finished on a corn-based diet for true corn-fed flavor and optimum marbling.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseThree">Why do your prices differ from those of fast-food chains?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                We pride ourselves in our commitment and emphasis on high quality ingredients. From sourcing our 100% all-natural Angus beef patties that are hormone- and antibiotic-free, to hand-cutting our french fries and onion rings daily. We create chef-inspired recipes like our VEGEFI Burger and BURGER Sauce from more than a dozen premium ingredients. We realize there are faster ways, but we prefer the honest way. We make food for people who care.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseFour">Is your VegeFi burger vegan?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                Our VegeFi Burger is vegetarian. It is not, however, vegan. We use dairy products like parmesan, fontina and egg to not only create great flavor, but to bind the burger together.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseFive">Beet greens peanut salad?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseSix">How big are your burgers?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">
                                Each of our patties are just under a quarter pound before cooking – and with our signature burgers, you get two of ’em. That’s not just a lot of burger. It’s some of the highest-quality, free-range, humanely raised beef you can find.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseSeven">Do you have an allergens list?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="panel-body">
                                If you have a food allergy, please refer to our allergen information link provided below prior to ordering and be sure to let our team know. Peanuts, nuts and other food allergens are present at BURGER, and we cook with 100% peanut oil. Before placing your order, please let us know if you have a food allergy and we’ll do our best to accommodate.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseEight">Burger Allergen Guide<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse">
                            <div class="panel-body">
                                Our Multigrain bun is vegan. However, our potato bun is not.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseNine">Do you offer gluten-free options?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseNine" class="panel-collapse collapse">
                            <div class="panel-body">
                                While we don’t currently offer a gluten-free bun, we can prepare any of our burgers or dogs green-style, meaning it comes served on a crisp lettuce “bun.” Some things to keep in mind: Our VegeFi Burger is made with breadcrumbs, our onion rings are breaded with flour, and beer generally contains gluten.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseTen">Why is the wait longer than that of fast-food chains?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseTen" class="panel-collapse collapse">
                            <div class="panel-body">
                                Making delicious food that you can order, pick up and eat quickly actually takes quite a bit of time and preparation. Burger is committed to serving fresh, high-quality food to our guests. As a result of our commitment to quality – hand-cutting fresh potatoes to make our fries, to carefully crafting our Burger Sauce from fresh ingredients – our cooking process may take a bit longer than a traditional fast casual restaurant.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseEleven">Where can I find your nutritional information?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseEleven" class="panel-collapse collapse">
                            <div class="panel-body">
                                Refer to our <a href="#" target="_blank">nutritional information document.</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End panel-group -->

            </div><!-- End col-md-9 -->
        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->

@endsection
@push('js')


@endpush
