@extends('frontend.layouts.master')
@section('title', 'Faq')
@push('css')
    <style>
        .requiredCustom{
            font-size: 20px;
            color: red;
            margin-top: 20px;
        }
    </style>
@endpush
@section('content')


    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{asset('frontend/img/about.png')}}" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Franchise Criteria</h1>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->
    <!-- Content ================================================== -->

    <div class="container-fluid" style="background-color: #FFFFFF;padding-top: 70px;border-bottom: 1px solid #ddd">
        <div class="row" style="margin-bottom: 70px;">
            <div class="col-md-6">
                <div class="custom_features">
                    <div class="custom_features-content">
                        <h2>Franchise Criteria</h2>
                        <p tabindex="1">The ideal partner should meet the following criteria to gain consideration for a Burger Franchise:</p>
                        <ul>
                            <li>Experience as a single or multi-unit restaurant operator</li>
                            <li>Minimum liquid assets of $150,000 per store to be developed</li>
                            <li>Minimum net worth of $400,000 per store to be developed</li>
                            <li>Infrastructure and resources to meet your development schedule</li>
                            <li>Real estate experience in the market to be developed</li>
                            <li>Total commitment to the development of the Burger brand</li>
                        </ul>


                        Aside from the required capital investment, a franchisee must be actively involved as an operator of their Burger restaurant(s) either through their own involvement or that of a dedicated operating partner (with equity) who is committed to the full-time management of the Burger business.
                        <h4 style="margin-top:20px;"><strong>Initial Investment</strong></h4>

                        The estimated total initial investment ranges from $513,600 to $787,250, which includes the one-time initial franchise fee of $20,500.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom_features">
                    <div class="custom_features-content">
                        <img src="{{asset('frontend/img/food.jpg')}}" alt="" width="450" height="auto" style="padding-top: 50px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background-color: #FFFFFF;padding-top: 70px;">
        <div class="row" style="margin-bottom: 70px;">
            <div class="col-md-6">
                <div class="custom_features">
                    <div class="custom_features-content">
                        <h1>Interested? Get Started Here</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6 nopadding" >
                <div class="custom_features-content">
                    {{--<h3>Sign Up Now</h3>--}}
                    <form action="{{route('franchise.store')}}" method="post">
                        @csrf
                        <div class="form-group col-md-8">
{{--                            <small class="requiredCustom">*</small>--}}
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" name="markets_of_interest" class="form-control" id="markets_of_interest" placeholder="Market(s) Of Interest">
                        </div>
                        <div class="form-group col-md-8">
                            <select class="form-control" id="restaurant_experience" name="restaurant_experience">
                                <option value="">Please Choose</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <select class="form-control" id="liquid_capital_available" name="liquid_capital_available">
                                <option value="">Please Choose</option>
                                <option value="Less than $199,000">Less than $199,000</option>
                                <option value="$200,000 - $499,000">$200,000 - $499,000</option>
                                <option value="$500,000 - $749,000">$500,000 - $749,000</option>
                                <option value="$750,000 - $999,000">$750,000 - $999,000</option>
                                <option value="More than $1,000,000">More than $1,000,000</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" name="net_worth" class="form-control" id="net_worth" placeholder="Net Worth">
                        </div>
                        <div class="form-group col-md-8">
                            <span>How did you hear about us? (Select all that apply)</span>

                            <div>
                                <label for="store-visit"><input id="store_visit" name="store_visit" type="checkbox" />Store Visit</label>
                            </div>
                            <div>
                                <label for="online-research"><input class="input input--checkbox" id="online_research" name="online_research" type="checkbox" />Online Research</label>
                            </div>
                            <div>
                                <label for="digital-ad"><input class="input input--checkbox" id="digital_ad" name="digital_ad" type="checkbox" />Digital Ad</label>
                            </div>
                            <div>
                                <label for="print-ad"><input class="input input--checkbox" id="print_ad" name="print_ad" type="checkbox" />Print Ad</label>
                            </div>
                            <div>
                                <label for="trade-show"><input class="input input--checkbox" id="trade_show" name="trade_show" type="checkbox" />Trade Show</label>
                            </div>
                            <div>
                                <label for="radio-tv"><input class="input input--checkbox" id="radio_tv" name="radio_tv" type="checkbox" />Radio/TV</label>
                            </div>
                            <div>
                                <label for="press-media"><input class="input input--checkbox" id="press_media" name="press_media" type="checkbox" />Press/Media</label>
                            </div>
                            <div>
                                <label for="other"><input class="input input--checkbox" id="other" name="other" type="checkbox" />Other</label>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <textarea class="form-control" placeholder="Additional Comments (Optional)" id="additional_comments_optional" name="additional_comments_optional"></textarea>
                        </div>
                        <div class="form-group col-md-8">
                            <span>Preferred method of being contacted</span>
                            <select class="form-control" id="liquid_capital_available" name="liquid_capital_available">
                                <option value="">Please Choose</option>
                                <option value="Email">Email</option>
                                <option value="Phone">Phone</option>
                                <option value="Text">Text</option>
                                <option value="No Preference">No Preference</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <button class="btn_1" id="happy" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 nopadding" >--}}
{{--                <div class="features">--}}
{{--                    <div class="features-content" style="">--}}
{{--                        <h2>Franchise Criteria</h2>--}}
{{--                        <p tabindex="1">The ideal partner should meet the following criteria to gain consideration for a Burger Franchise:</p>--}}
{{--                        <ul>--}}
{{--                            <li>Experience as a single or multi-unit restaurant operator</li>--}}
{{--                            <li>Minimum liquid assets of $250,000 per store to be developed</li>--}}
{{--                            <li>Minimum net worth of $500,000 per store to be developed</li>--}}
{{--                            <li>Infrastructure and resources to meet your development schedule</li>--}}
{{--                            <li>Real estate experience in the market to be developed</li>--}}
{{--                            <li>Total commitment to the development of the Burger brand</li>--}}
{{--                        </ul>--}}
{{--                        Aside from the required capital investment, a franchisee must be actively involved as an operator of their Burger restaurant(s) either through their own involvement or that of a dedicated operating partner (with equity) who is committed to the full-time management of the Burger business.--}}
{{--                        <h3 style="margin-top:20px;"><strong>Initial Investment</strong></h3>--}}
{{--                        &nbsp;--}}

{{--                        The estimated total initial investment ranges from $613,600 to $987,250, which includes the one-time initial franchise fee of $37,500.--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 nopadding">--}}
{{--                --}}{{--<img src="{{asset('frontend/img/home/Print-Summer-Smash-Burger.jpg')}}" alt="" style="width: 100%;height:600px";>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- End Content =============================================== -->

@endsection
@push('js')


@endpush
