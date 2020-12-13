@extends('frontend.layouts.master')
@section('title', 'Rewards')
@push('css')

@endpush
@section('content')


    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{asset('frontend/img/about.png')}}" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Rewards</h1>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->
    <!-- Content ================================================== -->
    <div class="container-fluid">
        <div class="row" style="height:600px;">
            <div class="col-md-6 nopadding" >
                <div class="features">
                    <div class="features-content" style="height:600px;">
                        <h3>Burger Rewards Program</h3>
                        <p>It's easy! Download the Burger App to earn points for ever visit. For every $1 spent, you receive 1 point. Once you reach 100 points, you receive $10 reward towards your next visit at Burger.</p>
                        <p>As a Burger Rewards member, you'll receive exclusive offers and promotions such as double point days, birthday rewards and more.</p>
                        <a href="{{route('menu')}}">  <div class="btn_1" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold">Download App</div></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 nopadding features-intro-img">
                <img src="{{asset('frontend/img/home/Print-Summer-Smash-Burger.jpg')}}" alt="" style="width: 100%;height:600px";>
            </div>
        </div>
    </div>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-bottom: 50px">
                <h1>Frequently Asked Question</h1>
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
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseOne">How do I use my free fry reward?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                All you have to do is place an order for a regular fry on your first order using the app, whether ordering ahead or in store.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseTwo">My Free Fry reward disappeared? Where did it go?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                Your free fry reward is only available for redemption for a regular size fry and only during your first order using the app.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseThree">How do I add a credit card to my account?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                Under the Account tab in the main menu select "Manage Cards" and add your payment card there. You can choose your payment preference to either be “Instant Billing” or you can add the desired amount to your account by selecting “Add funds”. Instant Billing will be you after each purchase using your App at a Burger restaurant.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseFour">Can I order through the app and pay with cash in store?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                No. If you are ordering through the app you must pay online.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseFive">I forgot to scan my app while I was in store. How can I get credit for my visit?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                Our Rewards Inquiry form can help you get points for a past order – just be sure to have your receipt readily available. To find this, see the contact us page on our site.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseSix">Can I add a gift card to pay within the app?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">
                                A physical gift card cannot be added to your rewards account. If you wish to send an e-gift card, you can find this feature in the dropdown menu.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseSeven">I want to earn points, but I don't want to use my rewards. How do I do that?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="panel-body">
                                Click My rewards and ensure the desired reward is turned off. The toggle button should be grey.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseEight">When do I receive my birthday shake/ I didn't receive my Birthday shake?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse">
                            <div class="panel-body">
                                You must have entered your birthday in the “Profile” section of your app. On your birthday, if you have already made a transaction, you will receive your birthday reward. This reward will be valid for 30 days. If you still do not see your reward please contact
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseNine">How do I migrate my points from my old loyalty card to the app?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseNine" class="panel-collapse collapse">
                            <div class="panel-body">
                                To Migrate points, select “Migrate Points” from your dropdown menu. From there you will be prompted to enter the phone number associated with your old account.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseTen">I ordered through the app to get my promotion, but it was not applied. What happened?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseTen" class="panel-collapse collapse">
                            <div class="panel-body">
                                Most promotions are valid in-store only. To use them, you must order in-store and scan your app at the register.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapseEleven">How do I request/check on a refund?<i class="indicator icon_plus_alt2 pull-right"></i></a>
                            </h4>
                        </div>
                        <div id="collapseEleven" class="panel-collapse collapse">
                            <div class="panel-body">
                                For a refund, it’s best to contact us directly. Please reach out to us at
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
