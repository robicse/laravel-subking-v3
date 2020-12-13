@extends('frontend.layouts.master')
@section('title', 'Career')
@push('css')

@endpush
@section('content')


    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{asset('frontend/img/about.png')}}" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Career</h1>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->
    <!-- Content ================================================== -->
{{--    <div class="container-fluid">--}}
{{--        <div class="row" style="height:600px;">--}}
{{--            <div class="col-md-6 nopadding" >--}}
{{--                <div class="features">--}}
{{--                    <div class="features-content" style="height:600px;">--}}
{{--                        <h3>Burger Rewards Program</h3>--}}
{{--                        <p>It's easy! Download the Burger App to earn points for ever visit. For every $1 spent, you receive 1 point. Once you reach 100 points, you receive $10 reward towards your next visit at Burger.</p>--}}
{{--                        <p>As a Burger Rewards member, you'll receive exclusive offers and promotions such as double point days, birthday rewards and more.</p>--}}
{{--                        <a href="{{route('menu')}}">  <div class="btn_1" style="height: 55px;width: 175px;padding-top: 17px;color: #0c0c0c;font-size: 15px;font-weight: bold">Download App</div></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 nopadding features-intro-img">--}}
{{--                <img src="{{asset('frontend/img/home/Print-Summer-Smash-Burger.jpg')}}" alt="" style="width: 100%;height:600px";>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container margin_60_35">
        <div class="row">
            @if(!empty($careers))
                @foreach($careers as $career)
                <div class="col-md-12" style="background-color: #ddd;padding-bottom: 20px;">
                    <h1>Subking</h1>
                    <br/>
                    <p>{{$career->title}}</p>
                    <p>{{$career->education}}</p>
                    <p>{{$career->experience}}</p>
                    <p>{{$career->deadline}}</p>
                    <br/>
                    <a class="btn btn-info waves-effect" href="{{route('career.detail',$career->id)}}">Details</a>
                </div>
                @endforeach
            @endif
        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->

@endsection
@push('js')


@endpush
