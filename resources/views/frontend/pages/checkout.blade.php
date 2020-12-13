@extends('frontend.layouts.master')
@section('title', 'Home')
@push('css')
    <!-- Radio and check inputs -->
    <link href="{{asset('frontend/css/skins/square/grey.css')}}" rel="stylesheet">
    <style>
        table, th, td {

            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        body {
            font-family: font-family: 'Rubik', sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 85%;
            background: #f1f1f1;
        }

        form.example button {
            float: left;
            width: 15%;
            padding: 10px;
            background: #C58E33;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }

        form.example button:hover {
            background: #C58E33;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }
        button {
            display: inline-block;
            background-color: #C58E33;
            color: #eee;
            margin: 0px;
            position: relative;
            width: 100%;
            height: 45px;
            border-radius: 5px;
            border: none;
            font-size: 1.5em;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 2px 8px 0 #999;
        }
        button:hover {
            background-color: #999;

        }


        /**
        * The CSS shown here will not be introduced in the Quickstart guide, but shows
        * how you can use CSS to style your Element's container.
        */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid #dbdbdb;
            border-radius: 4px;
            background-color: white;

            /*box-shadow: 0 1px 3px 0 #e6ebf1;*/
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #ea2902;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

    </style>
@endpush
@section('content')
    <script src="https://js.stripe.com/v3/"></script>
    <div class="container-fluid container-top" style=" padding:0 0 0 0">
        <div class="col-md-12" style=" padding:0px">
            <div class="col-md-6" style=" padding:0px;background-color: #FFFFFF">
                <!-- map-->
                <section id="map">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 map " style="padding: 0px;">
                                <div id="googleMap" style="width:100%;height:300px;"></div>
                            </div>
                            <div class="col-md-12" style="margin-top: 35px;">
                                <h4>Your order will be ready at
                                    @if($delivery_time == 'As Soon As Possible')
                                        {{$delivery_time}}
                                    @else
                                        {{$delivery_schedule_day}} {{$delivery_schedule_time}}
                                    @endif
                                    </h4>
                                <h4>At this location:</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="right" style="margin-top: 20px;margin-left:10px;: ">
                                    <h2>
                                        <b>
                                            @php
                                                echo Session::get('location_title') ? Session::get('location_title') : '';
                                            @endphp
                                        </b>
                                    </h2>
                                    <p style="font-size: 1.4em;font-weight: lighter;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @php
                                            echo Session::get('address') ? Session::get('address') : '';
                                        @endphp
                                    </p>
                                    {{--<a href="" > <p  style="font-size: 1.4em;">01703500587</p></a>--}}
                                    <p  style="font-size: 1.4em;font-weight: lighter;">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        @php
                                            echo Session::get('phn_no') ? Session::get('phn_no') : '';
                                        @endphp
                                    </p>
                                </div>
                            </div>
                            @php
                                $sub_total = 0;
                            @endphp
                            @foreach(Cart::content() as $product)
                                @php
                                    $sub_total += $product->options->final_price;
                                @endphp

                                @php
                                    //Session::forget('coupon_amount');
                                    //Session::forget('coupon_discount_type');
                                    //Session::forget('coupon_expired_date');
                                    $coupon_amount = Session::get('coupon_amount') ? Session::get('coupon_amount') : 0;
                                    $coupon_discount_type = Session::get('coupon_discount_type') ? Session::get('coupon_discount_type') : 0;
                                    $coupon_expired_date = Session::get('coupon_expired_date') ? Session::get('coupon_expired_date') : 0;
                                    $current_date = date('Y-m-d H:i:s');
                                    if(($coupon_amount > 0) && ($current_date < $coupon_expired_date)){
                                        if($coupon_discount_type == 'flat'){
                                            $sub_total -= $coupon_amount;
                                        }else{
                                            $percentage = ($sub_total*$coupon_amount)/100;
                                            $sub_total -= $percentage;
                                        }
                                    }
                                @endphp
                            @endforeach
                            @if($coupon_amount == 0)
                            <div class="col-md-12">
                                <form class="example" action="{{route('coupon.apply')}}" method="post" style="margin-top: 30px;margin-bottom: 20px">
                                    @csrf
                                    <input style="border-radius: 5px;border-right: 0px;border-bottom-right-radius:0px;border-top-right-radius:0px;" type="text" placeholder="Coupon Code " name="coupon">
                                    <button id="happy" style="border-radius: 5px;border: 0px;border-bottom-left-radius:0px;border-top-left-radius:0px;">Apply</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </section>
                <!-- map end-->
                <table style="width:100% ;background-color: #545454;">
                    <tr>
                        <td =""><h4 style="color: #FFFFFF"><b>Total</b></h4></td>
                        <td style="text-align:right;"><h4><b style="color: #FFFFFF">${{$sub_total}}</b></h4></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6" style="background-color:#FFFFFF; height: 750px">
                <form action="{{route('order.checkout.add')}}" method="post" id="payment-form">
                    @csrf
                    <div class="text-center" style="margin-top: 40px;margin-left:6px; margin-bottom: 50px">
                        <h1>Checkout as Guest</h1>
                    </div>
                    <div class="select col-md-12">
                        <table style="width:100%">
                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="delivery_time" value="{{$delivery_time ? $delivery_time :''}}">
                                                <input type="hidden" class="form-control" name="delivery_schedule_day" value="{{$delivery_schedule_day ? $delivery_schedule_day :''}}">
                                                <input type="hidden" class="form-control" name="delivery_schedule_time" value="{{$delivery_schedule_time ? $delivery_schedule_time :''}}">

                                                {{--                                                <label for="first_name">First Name</label>--}}
                                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                {{--                                                    <label for="last_name">Last Name</label>--}}
                                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                {{--                                                <label for="email">Email</label>--}}
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                {{--                                                <label for="name">Phone</label>--}}
                                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                                            </div>
                                        </div>
                                        <div class="card-body" style="margin-top: 80px;margin-bottom: 20px;">
                                            <label for="card-element">
                                                <input type="radio" name="pay_online" value="1" checked> Pay Online
                                            </label>
                                            <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>

                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" role="alert"></div>
                                        </div>
                                        <div class="card-body">&nbsp;</div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{asset('frontend/js/ResizeSensor.min.js')}}"></script>
    <script src="{{asset('frontend/js/theia-sticky-sidebar.min.js')}}"></script>
    <script>
        jQuery('#sidebar').theiaStickySidebar({
            additionalMarginTop: 80
        });
        $(document).ready(function(){

            var quantitiy=0;
            $('.quantity-right-plus').click(function(e){

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if(quantity>0){
                    $('#quantity').val(quantity - 1);
                }
            });

        });

    </script>



    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAAyw5V6JhRggp5YaBz2jto_q4HdH0Du1E"></script>

    <script type="text/javascript">
        //=========================================
        //Map
        //=========================================

        function init_map() {
            //var var_location = new google.maps.LatLng(23.7924338,90.4266676);
            //var var_location = new google.maps.LatLng(40.650002, -73.949997);
            var var_location = new google.maps.LatLng(<?php echo Session::get('lat') ? Session::get('lat') : ''?>, <?php echo Session::get('lng') ? Session::get('lng') : ''?>);

            var var_mapoptions = {

                center: var_location,

                zoom: 14

            };

            var var_marker = new google.maps.Marker({

                position: var_location,

                map: var_map,

                title:"Rideox"});

            var var_map = new google.maps.Map(document.getElementById("googleMap"),

                var_mapoptions);

            var_marker.setMap(var_map);

        }

        google.maps.event.addDomListener(window, 'load', init_map);

        //===========================================

    </script>

    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51HMcwLFCAzEBifE7afQqXQ2YHFcywOcFNcJmOKVdBtm3oEO8cKkx0nBcHR6C546oSDZUsScTQaep8ZRN6henhTew00WpiPycVl');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>


@endpush
