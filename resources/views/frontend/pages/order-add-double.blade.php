@extends('frontend.layouts.master')
@section('title', 'Order menu')
@push('css')
    <style>
        /*a:hover .food-list{*/

        /*}*/
        label:hover, label:active, input:hover+label, input:active+label {
            background: rgb(221,187,120);
            background: radial-gradient(circle, rgba(221,187,120,1) 8%, rgba(197,142,51,1) 90%);
        }
        table, th, td {
            border-collapse: collapse;
        }
        th, td {
            padding: 0px;
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

        [type=checkbox] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* IMAGE STYLES */
        [type=checkbox] + img {
            cursor: pointer;
        }
        [type=checkbox] + label {
            cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=checkbox]:checked + img {
            outline: 3px solid #C58E33;
            border-radius: 0px;
        }
        [type=checkbox]:checked + label {
            color: #C58E33;
        }
        .li-list-ingredient{
            border: 1px solid #c58e33;border-radius: 20px; background: #fff; padding: 3px 10px; margin-bottom: 8px;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid container-top">
        <form action = "{{route('order.add.cart')}}" method = "post" id="order_form">
            @csrf
            <div class="row">
                <div class="col-md-12" style="padding: 0 0 0 0">
                    <div class="col-md-5" style="background-color: #f5f5f5; padding: 0 0 0 0 ;">
                        <div style="margin-bottom: 15%">
                            <div class="col-md-12 text-center">
                                <div class="nopadding features-intro-img" >
                                    <div class="features " >
                                        <h3 class="float-left" style="margin-top: 20px">{{$product->name}}</h3>
                                        <img src="{{asset('uploads/product/'.$product->image)}}" alt="" style="width: 50%;height:50%;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="" style="margin-left: 10px;">
                                    <div class="" >
                                        <h4>Includes:</h4>
                                        <ul class="list-inline ul-list-ingredient">
                                            @foreach($productIng as $prd)
                                                @php
                                                    $pingred = explode(",", $prd->ingredient_ids);
                                                    //dd($pingred);
                                                @endphp
                                                @foreach($pingred as $prd)
                                                    @php
                                                      $ingr=\App\Ingredient::find($prd);
                                                    @endphp
                                                    <li id="li_ingredient_{{$ingr->id}}_{{(float)$ingr->price}}" data-id="bind_{{$ingr->id}}" style="margin-right: 5px;cursor: pointer;"  class="li-list-ingredient"><span>{{$ingr->name}}</span> <i class="icon-cancel" style="color: black!important;"></i></li>
                                                @endforeach

                                            @endforeach
                                        </ul>
                                    </div>
                                    <table style="width:100% ;margin-top: 2%;padding-left: 0px">
                                        <tr>
                                            <td rowspan=""><h5>{{$product->name}}</h5></td>
                                            <td style="text-align:right">${{$product->price}}</td>
                                        </tr>
                                    </table>
                                    <table style="width:100% ;">
                                        <tr>
                                            <td rowspan=""><h4>Sub Total</h4></td>
                                            <td class="subt" style="text-align:right"><h4>${{$final_price}}</h4></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <input type = "hidden" name="product_id" value="{{$product->id}}">
                            <input type = "hidden" name="product_final_price" value="{{$final_price}}">
                            {{--                            <button id="happy" type="submit" style="width: 90%; margin-left: 5%">Add  to Cart</button>--}}
                            <button type="button" id="happy" class="" style="width: 90%; margin-left: 5%" data-toggle="modal" data-target="#exampleModalCenter">
                                Add  to Cart
                            </button>
                        </div>
                    </div>

                    <div class="col-md-7" style="padding: 0 0 0 0;background-color: #FFFFFF">
                        <div class="col-md-12" >
                            <div class="row" style="overflow-y: scroll;height: 600px;">
                                <div class="col-md-12 " style="margin-top: 15px;margin-bottom: 10px;margin-left: 20px;">

{{--                                    <h3 style="margin-left: 5%">CHOOSE:</h3>--}}
{{--                                    <a href="">--}}
{{--                                        <div class="col-md-3 nopadding food-list">--}}
{{--                                            <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 100%;">--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="">--}}
{{--                                        <div class="col-md-3 nopadding food-list">--}}
{{--                                            <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 100%;">--}}
{{--                                        </div>--}}
{{--                                    </a>--}}

{{--                                    <div class="col-md-3 nopadding food-list " onclick="ingredient()">--}}
{{--                                        <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 100%;">--}}
{{--                                    </div>--}}
                                    @if($type=="single")
                                        <h3>Customizing as Single</h3>
                                        <a href="/order/edit/double/{{$product->slug}}" class="btn_1">Customize as Double</a>
                                    @else
                                        <h3>Customizing as Double</h3>
                                        <a href="/order/edit/single/{{$product->slug}}" class="btn_1">Customize as Single</a>
                                    @endif
                                </div>
                                @foreach($sideCat as $side)
                                    @php

                                        if($productIng->contains('side_category_id', $side->id)){
                                            $sidehas=1;
                                        }else{
                                            $sidehas=0;
                                        }

                                    @endphp
                                    @if($sidehas==0)
                                        <div class="col-md-12">
                                            <h3 style="margin-left: 30px">{{$side->name}}:</h3>
                                            <div class="row">
                                                @php
                                                    $ingredient=\App\Ingredient::where('side_category_id',$side->id)->get();
                                                @endphp
                                                @foreach($ingredient as $ingr)
                                                    <label style="margin-left: 30px">
                                                        <input  type="checkbox" id="ingredient_{{$ingr->id}}_{{$ingr->price}}" data-id="bind_img_{{$ingr->id}}" name="ing_name[]" value="{{$ingr->name}}">
                                                        <img src="{{asset('uploads/ingredient/'.$ingr->image)}}" class="img-fluid" style="width: 200px;margin-right: 10px" >
                                                        <br/>
                                                        <div style="text-align: center;margin-top: 5px;">${{$ingr->price ? $ingr->price : 0}}</div>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-12">
                                            <h3 style="margin-left: 5%">{{$side->name}}:</h3>
                                            <div class="row">
                                                @php
                                                    $ingredient=\App\Ingredient::where('side_category_id',$side->id)->get();
                                                    $sideCat=$productIng->firstWhere('side_category_id', $side->id);
                                                    $pingred = explode(",", $sideCat->ingredient_ids);

                                                @endphp
                                                @foreach($ingredient as $ingr)
                                                    @php
                                                        $hasing=0;
                                                        $hasing=in_array ( $ingr->id, $pingred );
                                                        if($hasing){
                                                            $hasing=1;
                                                        }

                                                    @endphp
                                                    <label style="margin-left: 30px">
                                                        <input  type="checkbox" id="ingredient_{{$ingr->id}}_{{$ingr->price}}" data-id="bind_img_{{$ingr->id}}" name="ing_name[]" value="{{$ingr->name}}" {{$hasing == 1 ? 'checked' : ''}}>
                                                        <img src="{{asset('uploads/ingredient/'.$ingr->image)}}" class="img-fluid" style="width: 200px;margin-right: 10px" >
                                                        <br/>
                                                        <div style="text-align: center;margin-top: 5px;">${{$ingr->price ? $ingr->price : 0}}</div>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title" id="exampleModalLongTitle">May We Also Suggest</h3>
                    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--                        <span aria-hidden="true">&times;</span>--}}
                    {{--                    </button>--}}
                </div>
                <div class="modal-body" style="padding: 0px">
                    <div class="container-fluid">
                        <div class="row">
                            @php
                                $twoCategories = \App\Category::take(2)->get();
                            @endphp

                            @if(!empty($twoCategories))
                                @foreach($twoCategories as $twoCategory)
                                    @php
                                        //dd($dataTwo);
                                        $check_sub_category_id = \App\SubCategory::where('category_id',$twoCategory->id)->pluck('id')->first();
                                        if(!empty($check_sub_category_id)){
                                            $custom_url = url('sub-category/'.$check_sub_category_id);
                                        }else{
                                            $custom_url = url('category-food-list/'.$twoCategory->id);
                                        }
                                    @endphp
                                    <div class="col-md-6 text-center" style="padding: 0px">
                                        <a href = "{{$custom_url}}">
                                            <img class="img-fluid" src = "{{asset('uploads/category/'.$twoCategory->image)}}" alt = "No Image" width="300px" height="auto">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                            {{--<div class="col-md-6 text-center" style="padding: 0px">
                                <a href = "">
                                    <img class="img-fluid" style="max-height:150px;" src = "https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png" alt = "">
                                </a>
                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='/menu';">Back to Menu</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary modal_submit">Continue to Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"]').click(function(){
                var str = this.id;
                var price = str.split("_");
                //console.log(price[2]);
                // console.log(this.data('myval'));
                if($(this).prop("checked") == true){
                    // console.log("Checkbox is checked.");
                    $('.ul-list-ingredient').append('<li id="li_'+this.id+'" data-id="bind_'+price[1]+'"style="margin-right: 5px;cursor: pointer;" class="li-list-ingredient"><span>'+this.value+'</span> <i class="icon-cancel" style="color: black!important;"></i></li>')
                    var curprice=$("input[name=product_final_price]").val();
                    var finalPrice=parseFloat(curprice)+parseFloat(price[2]);
                    $("input[name=product_final_price]").val(finalPrice.toFixed(2));
                    $(".subt").html("$"+finalPrice.toFixed(2));

                }
                else if($(this).prop("checked") == false){
                    // console.log("Checkbox is unchecked.");
                    $("[data-id=bind_"+price[1]+"]").remove();
                    var curprice=$("input[name=product_final_price]").val();
                    var finalPrice=parseFloat(curprice)-parseFloat(price[2]);
                    $("input[name=product_final_price]").val(finalPrice.toFixed(2));
                    $(".subt").html("$"+finalPrice.toFixed(2));
                }
            });

            // $(".li-list-ingredient").click(function () {
            //
            //     var str = this.id;
            //     var chk = str.split("_");
            //     console.log(chk);
            //     var checkid = $('#' + chk[1]+'_'+ chk[2]+'_'+ chk[3]);
            //     checkid.prop("checked", false);
            //     $("#"+str).remove();
            //     var curprice=$("input[name=product_final_price]").val();
            //     var finalPrice=parseInt(curprice)-parseInt(chk[3]);
            //     $("input[name=product_final_price]").val(finalPrice);
            //     $(".subt").html("$"+finalPrice);
            // });

            $(".ul-list-ingredient").delegate("li", "click", function(){

                var datalistId = $(this).attr("data-id");
                console.log(datalistId);
                 var str = this.id;
                 var chk = str.split("_");
                 console.log(chk);
                 // var checkid = $('#' + chk[1]+'_'+ chk[2]+'_'+ chk[3]);
                var checkid = $("[data-id=bind_img_"+chk[2]+"]");
                 checkid.prop("checked", false);
                //$(".ul-list-ingredient").delegate("li_ingredient_3_0", "remove")
                // $("#"+this.id).closest("li").css("display", "none");
                // $("#"+dataId).remove();
                 $("[data-id="+datalistId+"]").remove();
                 var curprice=$("input[name=product_final_price]").val();
                 var finalPrice=parseInt(curprice)-parseInt(chk[3]);
                 $("input[name=product_final_price]").val(finalPrice);
                 $(".subt").html("$"+finalPrice);
            });
            $(".modal_submit").click(function () {
                $( "#order_form" ).submit();
            });
        })

    </script>
@endpush
