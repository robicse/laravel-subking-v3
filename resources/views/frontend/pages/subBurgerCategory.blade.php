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
        <h2 style="text-align: center;" >Subs</h2>
        <div class="row" style="padding: 8% 7%">

            <div class="col-md-12">
                <a href="{{url('single-page')}}">
                    <div class="col-md-6  features-intro-img">
                        <div class="features">
                            <img src="{{asset('frontend/img/burger.jpg')}}" alt="" style="width: 100%;height:300px";>
                            <div class="text">Hot Subs</div>
                            <div class="overlay">
                                <div class="text">Hot Subs</div>
                                <p class="overlay-p">See more...</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{url('single-page')}}">
                    <div class="col-md-6  features-intro-img">
                        <div class="features">
                            <img src="{{asset('frontend/img/food.jpg')}}" alt="" style="width: 100%;height:300px";>
                            <div class="text">Cold Subs</div>
                            <div class="overlay">
                                <div class="text">Cold Subs</div>
                                <p class="overlay-p">See more...</p>
                            </div>
                        </div>
                    </div>
                </a>
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
