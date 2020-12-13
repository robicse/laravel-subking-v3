@extends('frontend.layouts.master')
@section('title', 'Single Page')
@push('css')
    <style>
        body {
            font-family: font-family: 'Rubik', sans-serif;
        }

    </style>
@endpush
@section('content')
    <div class="container-fluid container-top">
        <form action = "{{route('order.add.cart.double')}}" method = "post" id="order_form">
            @csrf
            <input type = "hidden" name="product_id" value="{{$product->id}}">
            <input type = "hidden" name="product_final_price" value="{{$final_price}}">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 text-center" style=" ">
                                <img src="{{asset('uploads/product/'.$product->image)}}" alt="" style="width: 70%;">
                    </div>
                    <div class="col-md-6">
                        <div class="title" style="margin-top: 120px">
                            <h1>{{$product->name}}</h1>
                            <p>Taste big burger in town with beef,tomato,burger souce...</p>
                            <button style="padding: 10px 60px" type="button" id="happy" class="btn_1"  data-toggle="modal" data-target="#exampleModalCenter">
                                Add as Is
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="col-md-12" style="background-color: #e5e5e5;">
            <div class="row" style="margin:45px;color: black;font-size: 15px ">
                <div class="m-3 col-md-7">
                    <ul class="list-inline">
                        <li>Includes:</li>
                        @foreach($productIng as $ing)
                            @php
                                $pingred = explode(",", $ing->ingredient_ids);
                            @endphp
                            @foreach($pingred as $ingr)
                                @php
                                    $pin = \App\Ingredient::find($ingr);
                                @endphp
                                <li style="border-radius: 20px; background: #fff; padding: 5px 12px; ">
                                    <span>{{$pin->name}}</span>
                                </li>
                            @endforeach
                        @endforeach

                    </ul>
                </div>
                <div class="col-md-5">
                    <div class="row" style="margin-left: 15%">
                        <a href="/order/edit/double/{{$product->slug}}" class="btn_1">Customize as Double</a>
                        <a href="/order/edit/single/{{$product->slug}}" class="btn_1">Customize as Single</a>
                    </div>
                </div>
            </div>
        </div>
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
                                            <img class="img-fluid"  src = "{{asset('uploads/category/'.$twoCategory->image)}}" alt = "No Image" width="300px" height="auto">
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
    <script !src = "">
        $(".modal_submit").click(function () {
                $( "#order_form" ).submit();
            });
    </script>
@endpush
