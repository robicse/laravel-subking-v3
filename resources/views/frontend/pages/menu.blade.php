@extends('frontend.layouts.master')
@section('title', 'Order menu')
@push('css')
    <style>
        .features-intro-img:hover{
            background: red;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid container-top header-video">
        <div class="row" style="height:300px;">
            @foreach($categoriesForTwo as $dataTwo)
                @php
                    //dd($dataTwo);
                    $check_sub_category_id = \App\SubCategory::where('category_id',$dataTwo->id)->pluck('id')->first();
                    if(!empty($check_sub_category_id)){
                        $custom_url = url('sub-category/'.$dataTwo->id);
                    }else{
                        $custom_url = url('category-food-list/'.$dataTwo->id);
                    }
                @endphp

                @if($dataTwo->slug == 'subs')
                    <a href="{{$custom_url}}">
                        <div class="col-md-6 nopadding features-intro-img" style="height: 350px !important;">
                        <!--<iframe src="{{asset('frontend/video/TunaSubSubking.mp4?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1')}}" allow="autoplay; encrypted-media" width="540" height="310"></iframe>-->
                            <iframe src="https://www.youtube.com/embed/YxwbZyplbUQ?rel=0&amp;showinfo=0&autoplay=1&mute=1&constrols=0" allow="autoplay" frameborder="0" allowfullscreen="" height="278" style="width: 100%;"></iframe>
                            <div class="text">{{$dataTwo->name}}</div>
                        </div>
                    </a>
                @elseif($dataTwo->slug == 'burgers')
                    <a href="{{$custom_url}}">
                        <div class="col-md-6 nopadding features-intro-img" style="height: 350px !important;">
                        <!--<iframe src="{{asset('frontend/video/SubkingBurgerVideo.mp4?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1')}}" allow="autoplay; encrypted-media" width="540" height="310"></iframe>-->
                            <iframe src="https://www.youtube.com/embed/76SLwiy3Axo?rel=0&amp;showinfo=0&autoplay=1&mute=1&constrols=0" allow="autoplay" frameborder="0" allowfullscreen="" height="278" style="width: 100%;"></iframe>
                            <div class="text">{{$dataTwo->name}}</div>
                        </div>
                    </a>
                @elseif($dataTwo->slug == 'sides')
                    <a href="{{$custom_url}}">
                        <div class="col-md-6 nopadding features-intro-img" style="height: 350px !important;">
                        <!--<iframe src="{{asset('frontend/video/SubkingSlidesVideo.mp4?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1')}}" allow="autoplay; encrypted-media" width="540" height="310"></iframe>-->
                            <iframe src="https://www.youtube.com/embed/ff8Q7UP-mPQ?rel=0&amp;showinfo=0&autoplay=1&mute=1&constrols=0" allow="autoplay" frameborder="0" allowfullscreen="" height="278" style="width: 100%;"></iframe>
                            <div class="text">{{$dataTwo->name}}</div>
                        </div>
                    </a>
                @elseif($dataTwo->slug == 'kids-menu')
                    <a href="{{$custom_url}}">
                        <div class="col-md-6 nopadding features-intro-img" style="height: 350px !important;">
                        <!--<iframe src="{{asset('frontend/video/SubkingKidsMenu.mp4?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1')}}" allow="autoplay; encrypted-media" width="540" height="310"></iframe>-->
                            <iframe src="https://www.youtube.com/embed/QW5qh4PU5Tc?rel=0&amp;showinfo=0&autoplay=1&mute=1&constrols=0" allow="autoplay" frameborder="0" allowfullscreen="" height="278" style="width: 100%;"></iframe>
                            <div class="text">{{$dataTwo->name}}</div>
                        </div>
                    </a>
                @elseif($dataTwo->slug == 'milk-shakessmoothies')
                    <a href="{{$custom_url}}">
                        <div class="col-md-6 nopadding features-intro-img" style="height: 350px !important;">
                        <!--<iframe src="{{asset('frontend/video/SubkingMilkShakes.mp4?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1')}}" allow="autoplay; encrypted-media" width="540" height="310"></iframe>-->
                            <iframe src="https://www.youtube.com/embed/6soeKobwymY?rel=0&amp;showinfo=0&autoplay=1&mute=1&constrols=0" allow="autoplay" frameborder="0" allowfullscreen="" height="278" style="width: 100%;"></iframe>
                            <div class="text">{{$dataTwo->name}}</div>
                        </div>
                    </a>
                @elseif($dataTwo->slug == 'coffee-and-tea')
                    <a href="{{$custom_url}}">
                        <div class="col-md-6 nopadding features-intro-img" style="height: 350px !important;">
                        <!--<iframe src="{{asset('frontend/video/SubkingCoffeeVideoFull.mp4?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1')}}" allow="autoplay; encrypted-media" width="540" height="310"></iframe>-->
                            <iframe src="https://www.youtube.com/embed/83IgfVT8SqI?rel=0&amp;showinfo=0&autoplay=1&mute=1&constrols=0" allow="autoplay" frameborder="0" allowfullscreen="" height="278" style="width: 100%;"></iframe>
                            <div class="text">{{$dataTwo->name}}</div>
                        </div>
                    </a>
                @else
                    {{--                    <a href="{{$custom_url}}">--}}
                    {{--                        <div class="col-md-6 nopadding features-intro-img">--}}
                    {{--                            <div class="features">--}}
                    {{--                                <img src="{{asset('uploads/category/'.$dataTwo->image)}}" alt="" style="width: 100%;height:400px";>--}}
                    {{--                                <div class="text">{{$dataTwo->name}}</div>--}}
                    {{--                                <div class="overlay">--}}
                    {{--                                    <div class="text">{{$dataTwo->name}}</div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </a>--}}
                @endif

            @endforeach






        </div>
    </div>
    {{--<div class="container-fluid">
        <div class="row" style="height:300px;">
            @foreach($categoriesForFour as $dataFour)
            <a href="">
                <div class="col-md-3 nopadding features-intro-img">
                    <div class="features">
                        <img src="{{asset('uploads/category/'.$dataFour->image)}}" alt="" style="width: 100%;height:300px";>
                        <div class="text">{{$dataFour->name}}</div>
                        <div class="overlay">
                            <div class="text">{{$dataFour->name}}</div>
                            <p class="overlay-p">See more...</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach


        </div>
    </div>--}}

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
