@extends('frontend.layouts.master')
@section('title', 'Order menu')
@push('css')
    <style>
        a:hover .food-list{
            background: rgb(221,187,120);
            background: radial-gradient(circle, rgba(221,187,120,1) 8%, rgba(197,142,51,1) 90%);
        }
        .food-list-header-text{
            padding: 10px;
            font-size: 20px;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid container-top">
        <div class="row" style="height: 677px; overflow: hidden;">
            <a href="">
                <div class="col-md-5 nopadding features-intro-img">
                    <div class="features">
                        @php
                            $category_image = \App\Category::where('id',$category_id)->pluck('image')->first();
                        @endphp
                        <img src="{{asset('uploads/category/'.$category_image)}}" alt="" style="width: 100%;height:680px">
                        <div class="text">
                            @if(!empty($category_id) && empty($sub_category_id))
                                {{\App\Category::where('id',$category_id)->pluck('name')->first()}}
                            @endif

                            @if(!empty($category_id) && !empty($sub_category_id))
                                {{\App\SubCategory::where('category_id',$category_id)->where('id',$sub_category_id)->pluck('name')->first()}}
                            @endif
                        </div>
                        <div class="overlay">
                            <div class="text">
                                @if(!empty($category_id) && empty($sub_category_id))
                                {{\App\Category::where('id',$category_id)->pluck('name')->first()}}
                                @endif

                                @if(!empty($category_id) && !empty($sub_category_id))
                                        {{\App\SubCategory::where('category_id',$category_id)->where('id',$sub_category_id)->pluck('name')->first()}}
                                @endif
                            </div>
                            <p class="overlay-p">See more...</p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="col-md-7" style=" ">
                    <div class="row" style="overflow-y: scroll;height: 677px; ">
                        @foreach($products as $product)
                        <a href="{{route('order.edit.single',$product->slug)}}">
                            <div class="col-md-6 nopadding food-list" style="border: 1px solid;">
                                <h4 class="food-list-header-text">{{$product->name}}</h4>
                                <img src="{{asset('uploads/product/'.$product->image)}}" alt="" style="width: 100%;height: 250px">
                            </div>
                        </a>
                        @endforeach
                        {{--<a href="{{url('single-page')}}">
                            <div class="col-md-6 nopadding food-list">
                                <h4 class="food-list-header-text">CONFLICTED BURGER</h4>
                                <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 77%;">
                            </div>
                        </a>
                        <a href="{{url('single-page')}}">
                            <div class="col-md-6 nopadding food-list">
                                <h4 class="food-list-header-text">CONFLICTED BURGER</h4>
                                <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 77%;">
                            </div>
                        </a>
                        <a href="{{url('single-page')}}">
                            <div class="col-md-6 nopadding food-list">
                                <h4 class="food-list-header-text">CONFLICTED BURGER</h4>
                                <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 77%;">
                            </div>
                        </a>
                        <a href="{{url('single-page')}}">
                            <div class="col-md-6 nopadding food-list">
                                <h4 class="food-list-header-text">CONFLICTED BURGER</h4>
                                <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 77%;">
                            </div>
                        </a>
                        <a href="{{url('single-page')}}">
                            <div class="col-md-6 nopadding food-list">
                                <h4 class="food-list-header-text">CONFLICTED BURGER</h4>
                                <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 77%;">
                            </div>
                        </a>
                        <a href="{{url('single-page')}}">
                            <div class="col-md-6 nopadding food-list">
                                <h4 class="food-list-header-text">CONFLICTED BURGER</h4>
                                <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 77%;">
                            </div>
                        </a>
                        <a href="{{url('single-page')}}">
                            <div class="col-md-6 nopadding food-list">
                                <h4 class="food-list-header-text">CONFLICTED BURGER</h4>
                                <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 77%;">
                            </div>
                        </a>
                        <a href="{{url('single-page')}}">
                            <div class="col-md-6 nopadding food-list">
                                <h4 class="food-list-header-text">CONFLICTED BURGER</h4>
                                <img src="{{asset('frontend/img/conflicted-burger.png')}}" alt="" style="width: 77%;">
                            </div>
                        </a>--}}
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- End Content =============================================== -->

@endsection
@push('js')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{asset('frontend/js/video_header.js')}}"></script>
    <script>
        $(document).ready(function() {
            'use strict';
            HeaderVideo.init({
                container: $('.header-video'),
                header: $('.header-video--media'),
                videoTrigger: $("#video-trigger"),
                autoPlayVideo: true
            });
        });
    </script>
@endpush
