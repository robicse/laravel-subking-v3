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
        <div class="row" style="padding: 0% 7%">

            <div class="col-md-12">
                @foreach($sub_categories as $sub_category)
                <a href="{{url('sub-category-food-list/'.$category_id.'/'.$sub_category->id)}}">
                    <div class="col-md-6  features-intro-img">
                        <div class="features">
                            <img src="{{asset('uploads/sub_category/'.$sub_category->image)}}" alt="" style="width: 100%;height:300px";>
                            <div class="text">{{$sub_category->name}}</div>
                            <div class="overlay">
                                <div class="text">{{$sub_category->name}}</div>
                                <p class="overlay-p">See more...</p>
                            </div>
                        </div>
                    </div>
                </a>
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
