@extends('frontend.layouts.master')
@section('title', 'Contact')
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
                <h1>Contact Us</h1>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->
    <!-- Content ================================================== -->

    <div class="container-fluid" style="background-color: #FFFFFF;padding-top: 70px;">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-10" >
                <div class="custom_features-content">
                    {{--<h3>Sign Up Now</h3>--}}
                    <form action="{{route('contact.store')}}" method="post">
                        @csrf
                        <div class="form-group col-md-8">
                            <label for="cc_location">Select a Location<small class="requiredCustom">*</small></label>
                            <select class="form-control" id="cc_location" name="cc_location" required>
                                <option disabled selected value></option>
                                <option value="Alpharetta">Alpharetta</option>
                                <option value="Altamonte Springs">Altamonte Springs</option>
                                <option value="Amarillo">Amarillo</option>
                                <option value="Anchorage - Midtown">Anchorage - Midtown</option>
                                <option value="Anchorage - Muldoon">Anchorage - Muldoon</option>
                                <option value="Arlington">Arlington</option>
                                <option value="Auburn">Auburn</option>
                                <option value="Austin - Circle C">Austin - Circle C</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Avon">Avon</option>
                                <option value="Boca Raton - Boca Pointe">Boca Raton - Boca Pointe</option>
                                <option value="Boynton Beach - Gateway">Boynton Beach - Gateway</option>
                                <option value="Boynton Beach - West Boynton Beach Blvd">Boynton Beach - West Boynton Beach Blvd</option>
                                <option value="Brentwood">Brentwood</option>
                                <option value="Brooklyn">Brooklyn</option>
                                <option value="CNN Center">CNN Center</option>
                                <option value="Cary - Arboretum">Cary - Arboretum</option>
                                <option value="Cary - Crossroads">Cary - Crossroads</option>
                                <option value="Charlottesville - 5th Street Station">Charlottesville - 5th Street Station</option>
                                <option value="Cincinnati">Cincinnati</option>
                                <option value="Coming Soon - Towson - Downtown Towson">Coming Soon - Towson - Downtown Towson</option>
                                <option value="Commack">Commack</option>
                                <option value="Coral Springs">Coral Springs</option>
                                <option value="Cuyahoga Falls">Cuyahoga Falls</option>
                                <option value="Dallas - Mockingbird">Dallas - Mockingbird</option>
                                <option value="Dallas - North Dallas">Dallas - North Dallas</option>
                                <option value="Dania Pointe">Dania Pointe</option>
                                <option value="Davie">Davie</option>
                                <option value="Delray Beach - Linton Blvd.">Delray Beach - Linton Blvd.</option>
                                <option value="Delray Beach - Ocean Blvd">Delray Beach - Ocean Blvd</option>
                                <option value="Delray Beach - West Atlantic Ave">Delray Beach - West Atlantic Ave</option>
                                <option value="Denver">Denver</option>
                                <option value="Doral - City Place">Doral - City Place</option>
                                <option value="FLL Airport - Terminal 1">FLL Airport - Terminal 1</option>
                                <option value="Fort Lauderdale - 17th Street">Fort Lauderdale - 17th Street</option>
                                <option value="Fort Lauderdale - Sunrise">Fort Lauderdale - Sunrise</option>
                                <option value="Fort Myers">Fort Myers</option>
                                <option value="Fort Myers - Daniels Pkwy">Fort Myers - Daniels Pkwy</option>
                                <option value="Fort Wayne">Fort Wayne</option>
                                <option value="Fort Worth">Fort Worth</option>
                                <option value="Gainesville">Gainesville</option>
                                <option value="Glenview">Glenview</option>
                                <option value="Hallandale">Hallandale</option>
                                <option value="Hickory">Hickory</option>
                                <option value="Jacksonville - Riverside">Jacksonville - Riverside</option>
                                <option value="Jacksonville - St. Johns Town Center">Jacksonville - St. Johns Town Center</option>
                                <option value="Jupiter">Jupiter</option>
                                <option value="Kennesaw">Kennesaw</option>
                                <option value="Kissimmee - Margaritaville">Kissimmee - Margaritaville</option>
                                <option value="Kissimmee - The Crosslands">Kissimmee - The Crosslands</option>
                                <option value="Lake Mary">Lake Mary</option>
                                <option value="Latham">Latham</option>
                                <option value="Lauderdale-By-The-Sea">Lauderdale-By-The-Sea</option>
                                <option value="Lawrenceville">Lawrenceville</option>
                                <option value="Leawood">Leawood</option>
                                <option value="Leesburg">Leesburg</option>
                                <option value="Lexington - Avenue of Champions">Lexington - Avenue of Champions</option>
                                <option value="Lexington - Fayette Mall Plaza">Lexington - Fayette Mall Plaza</option>
                                <option value="Lighthouse Point">Lighthouse Point</option>
                                <option value="Lubbock">Lubbock</option>
                                <option value="Manchester">Manchester</option>
                                <option value="McAllen">McAllen</option>
                                <option value="Mesa">Mesa</option>
                                <option value="Miami - Collins Ave">Miami - Collins Ave</option>
                                <option value="Miami - Pinecrest">Miami - Pinecrest</option>
                                <option value="Miami - Washington Ave">Miami - Washington Ave</option>
                                <option value="Montgomery - Eastchase">Montgomery - Eastchase</option>
                                <option value="Myrtle Beach - Ocean Blvd">Myrtle Beach - Ocean Blvd</option>
                                <option value="Myrtle Beach - Surfside">Myrtle Beach - Surfside</option>
                                <option value="Naples - North Naples">Naples - North Naples</option>
                                <option value="New York City - Upper East Side">New York City - Upper East Side</option>
                                <option value="North Bethesda - Pike & Rose">North Bethesda - Pike & Rose</option>
                                <option value="North Myrtle Beach">North Myrtle Beach</option>
                                <option value="Northville">Northville</option>
                                <option value="Nottingham- The Avenue at White Marsh">Nottingham- The Avenue at White Marsh</option>
                                <option value="Oceanside">Oceanside</option>
                                <option value="Opelika">Opelika</option>
                                <option value="Orlando - Lake Nona">Orlando - Lake Nona</option>
                                <option value="Orlando - UCF">Orlando - UCF</option>
                                <option value="Oviedo">Oviedo</option>
                                <option value="Peachtree Corners">Peachtree Corners</option>
                                <option value="Pembroke Pines - City Center">Pembroke Pines - City Center</option>
                                <option value="Pembroke Pines - Towngate">Pembroke Pines - Towngate</option>
                                <option value="Philadelphia - Center City">Philadelphia - Center City</option>
                                <option value="Philadelphia - Fashion District">Philadelphia - Fashion District</option>
                                <option value="Philadelphia - Temple University">Philadelphia - Temple University</option>
                                <option value="Portland - Pioneer Place Mall">Portland - Pioneer Place Mall</option>
                                <option value="Poughkeepsie">Poughkeepsie</option>
                                <option value="Raleigh - Midtown">Raleigh - Midtown</option>
                                <option value="Raleigh-Durham (RDU) International Airport">Raleigh-Durham (RDU) International Airport</option>
                                <option value="San Antonio - Alamo Heights">San Antonio - Alamo Heights</option>
                                <option value="San Antonio - Bandera">San Antonio - Bandera</option>
                                <option value="Sarasota">Sarasota</option>
                                <option value="Saratoga Springs">Saratoga Springs</option>
                                <option value="Secaucus">Secaucus</option>
                                <option value="Seminole">Seminole</option>
                                <option value="Silver Spring">Silver Spring</option>
                                <option value="South Naples - Tamiami">South Naples - Tamiami</option>
                                <option value="South Padre Island">South Padre Island</option>
                                <option value="St. Lucie West">St. Lucie West</option>
                                <option value="Sunny Isles">Sunny Isles</option>
                                <option value="Tallahassee">Tallahassee</option>
                                <option value="Tampa - SoHo">Tampa - SoHo</option>
                                <option value="Tampa - USF">Tampa - USF</option>
                                <option value="Tempe">Tempe</option>
                                <option value="The Woodlands">The Woodlands</option>
                                <option value="Trinity">Trinity</option>
                                <option value="Tuscaloosa">Tuscaloosa</option>
                                <option value="Wellington">Wellington</option>
                                <option value="West Palm Beach - Rosemary Square">West Palm Beach - Rosemary Square</option>
                                <option value="Weston">Weston</option>
                                <option value="Windermere The Grove Dr.">Windermere The Grove Dr.</option>
                                <option value="Windermere Village">Windermere Village</option>
                                <option value="Winter Garden">Winter Garden</option>
                                <option value="Winter Park">Winter Park</option>
                                <option value="Woodbridge">Woodbridge</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <span>Please take a moment to tell us about your experience at this location. Responses to questions marked with an asterisk are required.</span>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">On what date did you visit Burger?<small class="requiredCustom">*</small></label>
                            <input type="text" name="date_of_visit" class="form-control" id="date_of_visit" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="customer-care-date_of_visit">Approximate Time of Visit</label>
                            <br/>
                            <label class="radio-inline">
                                <input type="radio" name="approximate_time_of_visit" value="11-4">11-4
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="approximate_time_of_visit" value="4-6">4-6
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="approximate_time_of_visit" value="6-9">6-9
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="approximate_time_of_visit" value="9-Close">9-Close
                            </label>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">What is your guest check number? Your guest check number can be found on your receipt. If you cannot locate your receipt, please skip this question and continue.</label>
                            <input type="text" name="check_number" class="form-control" id="check_number">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Email Address<small class="requiredCustom">*</small></label>
                            <input type="text" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Confirm Email Address<small class="requiredCustom">*</small></label>
                            <input type="text" name="confirm_email" class="form-control" id="confirm_email" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Phone Number<small class="requiredCustom">*</small></label>
                            <input type="number" name="phone" class="form-control" id="phone" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Zip Code<small class="requiredCustom">*</small></label>
                            <input type="number" name="zip_code" class="form-control" id="zip_code" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">First Name<small class="requiredCustom">*</small></label>
                            <input type="text" name="first_name" class="form-control" id="first_name" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Last Name<small class="requiredCustom">*</small></label>
                            <input type="text" name="last_name" class="form-control" id="last_name">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Order Type</label>
                            <select class="form-control" id="order_type" name="order_type">
                                <option value="Online / Mobile App Order">Online / Mobile App Order</option>
                                <option value="Take-Out">Take-Out</option>
                                <option value="Dine-In">Dine-In</option>
                                <option value="Delivery">Delivery</option>
                                <option value="Phone Order">Phone Order</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Payment Type</label>
                            <select class="form-control" id="payment_type" name="payment_type">
                                <option value="Store">Store</option>
                                <option value="Online">Online</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Comment About Your Visit<small class="requiredCustom">*</small></label>
                            <textarea class="form-control" placeholder="Additional Comments (Optional)" id="additional_comments_optional" name="additional_comments_optional" required></textarea>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="return">Will you return?</label>
                            <br/>
                            <label class="radio-inline">
                                <input type="radio" name="return" value="Yes">Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="return" value="No">No
                            </label>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="customer-care-date_of_visit">How many times have you dined at this location in the last 30 days?</label>
                            <br/>
                            <label class="radio-inline">
                                <input type="radio" name="dined_time" value="1">1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="dined_time" value="2-4">2-4
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="dined_time" value="5 or More">5 or More
                            </label>
                        </div>
                        <div class="form-group col-md-8">
                            <span>We respect your privacy and will never rent or sell your information. Must be 18 years or older to join / participate. By providing your email address above, you are opting-in to receive email from our company and you may choose to stop receiving emails from us at any time.</span>
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
