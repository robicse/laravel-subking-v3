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
            font-family: font-family: 'Rubik', sans-serif;;
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

    </style>
@endpush
@section('content')

    <div class="container-fluid container-top" style=" padding:0 0 0 0">
        <div class="col-md-12" style=" padding:0 0 0 0">
            <div class="col-md-6" style="background-color: #FFFFFF">
                <h2>Your order</h2>
                <p><b>Most Subking restaurants use peanut oil. Check allergen guide.</b></p>
                <table style="width:100%">
                        @php
                            $sub_total = 0;
                        @endphp
                        @foreach(Cart::content() as $product)
                            @php
                                $sub_total += $product->options->final_price;
                            @endphp
                            <tr>
                                <td><h5>{{$product->name}}</h5>
                                                                    @if(is_array($product->options) && count($product->options->ingredients)>0)
                                                                        @foreach($product->options->ingredients as $ing)
                                                                            {{$ing}},
                                                                        @endforeach
                                                                    @endif
                                </td>
                                <td ><h5>${{$product->options->final_price}}</h5></td>
                                <td class="text-center">
                                    {{--                                <div class="input-group" style="width: 120px">--}}
                                    {{--                                    <span class="input-group-btn"  hidden="hidden">--}}
                                    {{--                                        <button type="button" class="quantity-left-minus btn" hidden="hidden" style="background-color: white !important;padding: 0px 11px"  data-type="minus" data-field="">--}}
                                    {{--                                          <span class="glyphicon glyphicon-minus" style=""></span>--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </span>--}}
                                    {{--                                    <input type="text" id="{{$product->id}}" class="quantity" name="quantity" style="height: 47px" class="form-control input-number" value="{{$product->qty}}" min="1" max="100000">--}}
                                    {{--                                    <span class="input-group-btn">--}}
                                    {{--                                        <button type="button" class="quantity-right-plus btn  btn-number" style="background-color: white !important;padding: 0px 11px" data-type="plus" data-field="">--}}
                                    {{--                                            <span class="glyphicon glyphicon-plus"></span>--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </span>--}}
                                    {{--                                </div>--}}
                                    <form action="{{route('cart.qty.update',$product->rowId)}}" method="get">
                                        <div class = "form-group">
                                            <label class="" for = "formControlRange">
                                            <span>
                                                <input class="form-control-qn form-control " id="qtyUpdate" type = "number" min="1" max="" name="quantity" value="{{$product->qty}}" onchange="this.form.submit()" style="height: 30px;margin-top:20px;border: 0px solid #fff;font-weight: bold;color: #C58E33;width: 50%;">
                                            </span>
                                            </label>
                                        </div>
                                    </form>
                                </td>
{{--                                @if($product->qty==1)--}}
{{--                                    <td style="font-size: 1.2em;text-decoration: underline;"><a href="{{route('menu.edit',$product->rowId)}}">Edit</a></td>--}}
{{--                                @else--}}
{{--                                @endif--}}

                                <td><a href = "{{route('cart.remove',$product->rowId)}}"><i class="fa fa-trash" aria-hidden="true" style="font-size: 1.7em;"></i></a></td>
                            </tr>
                        @endforeach

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

                </table>
                {{--@if($coupon_amount == 0)
                <form class="example" action="{{route('coupon.apply')}}" method="post" style="margin-top: 30%;">
                    @csrf
                    <input style="border-radius: 5px;border-right: 0px;border-bottom-right-radius:0px;border-top-right-radius:0px;" type="text" placeholder="Coupon Code " name="coupon">
                    <button id="happy" style="border-radius: 5px;border: 0px;border-bottom-left-radius:0px;border-top-left-radius:0px;">Apply</button>
                </form>
                @endif--}}
                <table style="width:100% ;background-color: lightgrey;margin-top: 2%;padding-left: 0px">
                    <tr>
                        <td =""><h4>Sub Total</h4></td>
                        <td style="text-align:right"><h4>${{$sub_total}}</h4></td>
                    </tr>
                </table>
                <table style="width:100% ;background-color: #545454;">
                    <tr>
                        <td =""><h4 style="color: #FFFFFF"><b>Total</b></h4></td>
                        <td style="text-align:right;"><h4><b style="color: #FFFFFF">${{$sub_total}}</b></h4></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6" style="background-color:#efefef; height: 750px">
                <form action="{{route('order.checkout')}}" method="post">
                    @csrf
                    <div class="right" style="margin-top: 10%;">
                        <h1 style="font-weight: lighter">When</h1>
                    </div>
                    <div class="select col-md-12">
                        <table style="width:100%">
                            <tr>
                                <td> <div class="col-md-12">
                                        <input type="radio" name="delivery_time" checked value="As Soon As Possible">
                                        <label for="male" style="font-size: 17px;font-weight: lighter">As Soon As Possible</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="radio" name="delivery_time" value="Customized Time">
                                                <select class="form-control" name="delivery_schedule_day" id="delivery_schedule_day" style=" margin-left: 16px; margin-top: -30px" >
                                                    <option class="date_option" value="" selected>Select date</option>
                                                    <option class="date_option" value="Today">Today</option>
                                                    <option class="date_option" value="Tomorrow">Tomorrow</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" name="delivery_schedule_time" id="delivery_schedule_day" style="margin-top: -8px">
                                                    <option class="time_option" value="" selected>Select time</option>
                                                    <option class="time_option" value="10:00AM">10:00AM</option>
                                                    <option class="time_option" value="02:00PM">02:00PM</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        </table>



                        <div class="right" style="margin-top: 10%;margin-left:0px">
                            <h1 style="font-weight: lighter">Where</h1>
                        </div>
                        <div class="right" style="margin-top: 2%;margin-left:0px;: ">
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
                            <p style="text-align: center;font-size: 1.4em;margin-top: 5%;">Please Confirm Your Location Before Proceeding to Checkout</p>
                            <button id="happy">Proccess to Checkout</button>
                        </div>
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


        $(document).ready(function(){
            $('.date_option').hide();
            $('.time_option').hide();
        });

        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='delivery_time']:checked").val();
            if(radioValue == 'Customized Time'){
                $('.date_option').show();
            }else{
                $('.date_option').hide();
            }
        })

        $( "#delivery_schedule_day" ).change(function() {
            var get_value = $(this).val();
            if(get_value != ''){
                $('.time_option').show();
            }else{
                $('.time_option').hide();
            }
        });


    </script>


@endpush
