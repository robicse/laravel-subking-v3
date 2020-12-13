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
        <form action = "{{route('order.edit.cart')}}" method = "post" id="order_form">
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
                                <div class="col-md-11 col-md-offset-1">
                                    <div class="" >
                                        <h4>Includes:</h4>
                                        <ul class="list-inline ul-list-ingredient">
                                            @foreach($cartProduct->options->ingredients as $ing)
                                                @php
                                                    $ingr=\App\Ingredient::where('name',$ing)->first();
                                                @endphp
                                                <li id="li_ingredient_{{$ingr->id}}_{{(float)$ingr->price}}" data-id="bind_{{$ingr->id}}" style="margin-right: 5px;cursor: pointer;"  class="li-list-ingredient"><span>{{$ingr->name}}</span> <i class="icon-cancel" style="color: black!important;"></i></li>
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
                                            <td class="subt" style="text-align:right"><h4>${{$cartProduct->options->final_price}}</h4></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <input type = "hidden" name="product_id" value="{{$product->id}}">
                            <input type = "hidden" name="product_final_price" value="{{$cartProduct->options->final_price}}">
                            <input type = "hidden" name="cartID" value="{{$cartProduct->rowId}}">
                            {{--                            <button id="happy" type="submit" style="width: 90%; margin-left: 5%">Add  to Cart</button>--}}
                            <button type="submit" id="happy" class="" style="width: 90%; margin-left: 5%">
                                Save Edited Item
                            </button>
                        </div>
                    </div>

                    <div class="col-md-7"  style="padding: 0 0 0 0;background-color: #FFFFFF">
                        <div class="col-md-12" >
                            <div class="row" style="overflow-y: scroll;height: 600px;">
{{--                                <div class="col-md-12">--}}
{{--                                    <h3 style="margin-left: 20px">CHOOSE:</h3>--}}
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

{{--                                </div>--}}

                                @foreach($productIng as $product)
                                    @php
                                        $sideCat=\App\SideCategory::find($product->side_category_id);
                                        $ingredient = explode(",", $product->ingredient_ids);
                                    @endphp
                                    <div class="col-md-12">
                                        <h3 style="style="margin-left: 20px"">{{$sideCat->name}}:</h3>
                                        <div class="row">
                                            @foreach($ingredient as $ing)
                                                @php
                                                    $check=0;
                                                    $ingr=\App\Ingredient::find($ing);
                                                    $check=in_array ( $ingr->name, $cartProduct->options->ingredients )
                                                @endphp
                                                <label style="margin-left: 20px">
                                                    <input  type="checkbox" id="ingredient_{{$ingr->id}}_{{$ingr->price}}" data-id="bind_img_{{$ingr->id}}" name="ing_name[]" value="{{$ingr->name}}" {{$check == 1 ? 'checked' : ''}}>
                                                    <img src="{{asset('uploads/ingredient/'.$ingr->image)}}" class="img-fluid" style="width: 200px;margin-right: 10px" >
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"]').click(function(){
                var str = this.id;
                var price = str.split("_");
                //console.log(price);
                // console.log(this.data('myval'));
                if($(this).prop("checked") == true){
                    // console.log("Checkbox is checked.");
                    $('.ul-list-ingredient').append('<li id="li_'+this.id+'" data-id="bind_'+price[1]+'"style="margin-right: 5px;cursor: pointer;"  class="li-list-ingredient"><span>'+this.value+'</span> <i class="icon-cancel" style="color: black!important;"></i></li>')
                    var curprice=$("input[name=product_final_price]").val();
                    var finalPrice=parseFloat(curprice)+parseFloat(price[2]);
                    $("input[name=product_final_price]").val(finalPrice.toFixed(2));
                    $(".subt").html("$"+finalPrice.toFixed(2));
                }
                else if($(this).prop("checked") == false){
                    //console.log("Checkbox is unchecked.");
                    $("[data-id=bind_"+price[1]+"]").remove();
                    var curprice=$("input[name=product_final_price]").val();
                    var finalPrice=parseFloat(curprice)-parseFloat(price[2]);
                    $("input[name=product_final_price]").val(finalPrice.toFixed(2));
                    $(".subt").html("$"+finalPrice.toFixed(2));
                }
            });

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
            // function ing(){
            //     alert(a);
            // }
        })

    </script>
@endpush
