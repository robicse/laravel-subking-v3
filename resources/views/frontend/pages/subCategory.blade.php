@extends('frontend.layouts.master')
@section('title', 'Categoru')
@push('css')
    <style>
        .features-intro-img:hover{

        }
    </style>
@endpush
@section('content')
    <div class="container-fluid container-top" >
        <h1 style="text-align: center;font-size: 50px;font-weight: bold;margin-top: 40px;" >Subs</h1>
        <div class="row" style="padding: 0% 7%;height:300px;">

            <div class="col-md-12">
                @foreach($sub_categories as $sub_category)
                <a href="{{url('sub-category-food-list/'.$category_id.'/'.$sub_category->id)}}">
                    <div class="col-md-6  features-intro-img" style="height: 350px !important;">
{{--                        <div class="features">--}}
                            <!--<img src="{{asset('uploads/sub_category/'.$sub_category->image)}}" alt="" style="width: 100%;height:300px";>-->
                            @if($sub_category->name == 'Hot Sub')
                                <iframe src="https://www.youtube.com/embed/stMwSU4Dlok?rel=0&amp;showinfo=0&autoplay=1&mute=1&constrols=0" allow="autoplay" frameborder="0" allowfullscreen="" height="278" style="width: 100%;"></iframe>
                            @elseif($sub_category->name == 'Cold Sub')
                                <iframe src="https://www.youtube.com/embed/uOp2KSVeLOs?rel=0&amp;showinfo=0&autoplay=1&mute=1&constrols=0" allow="autoplay" frameborder="0" allowfullscreen="" height="278" style="width: 100%;"></iframe>
                             @else

                             @endif
                            <div class="text">{{$sub_category->name}}</div>
                            <div class="overlay">
                                <div class="text">{{$sub_category->name}}</div>
                                <p class="overlay-p">See more...</p>
                            </div>
{{--                        </div>--}}
                    </div>
                </a>

                <!--<a href="#">-->
                <!--        <div class="col-md-6 nopadding features-intro-img" style="height: 350px !important;">-->
                        <!--<iframe src="{{asset('frontend/video/TunaSubSubking.mp4?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1')}}" allow="autoplay; encrypted-media" width="540" height="310"></iframe>-->
                <!--            <iframe src="https://www.youtube.com/embed/YxwbZyplbUQ?rel=0&amp;showinfo=0&autoplay=1&mute=1&constrols=0" allow="autoplay" frameborder="0" allowfullscreen="" height="278" style="width: 100%;"></iframe>-->
                <!--            <div class="text">11</div>-->
                <!--        </div>-->
                <!--    </a>-->
                @endforeach
            </div>

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
