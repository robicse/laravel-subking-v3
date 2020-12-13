@extends('frontend.layouts.master')
@section('title', 'All Menu')
@push('css')

@endpush
@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{asset('frontend/img/about.png')}}" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>24 results in your zone</h1>
                <div><i class="icon_pin"></i> 135 Newtownards Road, Belfast, BT4 1AB</div>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->
    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div><!-- End Map -->

    <!-- Content ================================================== -->
    <div class="container margin_60_35">
        <div class="row">

            <div class="col-md-3">

                <div id="filters_col">
                    <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Category <i class="icon-plus-1 pull-right"></i></a>
                    <div class="collapse" id="collapseFilters">
                        <div class="filter_type">
                            <h6>Type</h6>
                            <ul>
                                <li><label><input type="checkbox" checked class="icheck">All <small>(49)</small></label></li>
                                <li><label><input type="checkbox" class="icheck">American <small>(12)</small></label><i class="color_1"></i></li>
                                <li><label><input type="checkbox" class="icheck">Chinese <small>(5)</small></label><i class="color_2"></i></li>
                                <li><label><input type="checkbox" class="icheck">Hamburger <small>(7)</small></label><i class="color_3"></i></li>
                                <li><label><input type="checkbox" class="icheck">Fish <small>(1)</small></label><i class="color_4"></i></li>
                                <li><label><input type="checkbox" class="icheck">Mexican <small>(49)</small></label><i class="color_5"></i></li>
                                <li><label><input type="checkbox" class="icheck">Pizza <small>(22)</small></label><i class="color_6"></i></li>
                                <li><label><input type="checkbox" class="icheck">Sushi <small>(43)</small></label><i class="color_7"></i></li>
                            </ul>
                        </div>
{{--                        <div class="filter_type">--}}
{{--                            <h6>Rating</h6>--}}
{{--                            <ul>--}}
{{--                                <li><label><input type="checkbox" class="icheck"><span class="rating">--}}
{{--							<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>--}}
{{--							</span></label></li>--}}
{{--                                <li><label><input type="checkbox" class="icheck"><span class="rating">--}}
{{--							<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>--}}
{{--							</span></label></li>--}}
{{--                                <li><label><input type="checkbox" class="icheck"><span class="rating">--}}
{{--							<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>--}}
{{--							</span></label></li>--}}
{{--                                <li><label><input type="checkbox" class="icheck"><span class="rating">--}}
{{--							<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>--}}
{{--							</span></label></li>--}}
{{--                                <li><label><input type="checkbox" class="icheck"><span class="rating">--}}
{{--							<i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>--}}
{{--							</span></label></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="filter_type">--}}
{{--                            <h6>Options</h6>--}}
{{--                            <ul class="nomargin">--}}
{{--                                <li><label><input type="checkbox" class="icheck">Delivery</label></li>--}}
{{--                                <li><label><input type="checkbox" class="icheck">Take Away</label></li>--}}
{{--                                <li><label><input type="checkbox" class="icheck">Distance 10Km</label></li>--}}
{{--                                <li><label><input type="checkbox" class="icheck">Distance 5Km</label></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div><!--End collapse -->
                </div><!--End filters col-->
            </div><!--End col-md -->

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 col-sm-6 wow zoomIn" data-wow-delay="0.1s" >
                        <a class="strip_list grid" href="{{route('menu')}}">
                            <div class="ribbon_1" style="height: 291px; width: 367px">Popular</div>
                            <img src="{{asset('frontend/img/b2.jpg')}}" style="height: 291px; width: 367px" alt="">
                            <div class="desc">

{{--                                <div class="thumb_strip">--}}
{{--                                    <img src="{{asset('frontend/img/b2.jpg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="rating">--}}
{{--                                    <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>--}}
{{--                                </div>--}}
                                <h3 style="margin-top: 10px">Taco Mexican</h3>
{{--                                <div class="type">--}}
{{--                                    Mexican / American--}}
{{--                                </div>--}}
{{--                                <div class="location">--}}
{{--                                    135 Newtownards Road, Belfast, BT4. <br><span class="opening">Opens at 17:00.</span> Minimum order: $15--}}
{{--                                </div>--}}
{{--                                <ul>--}}
{{--                                    <li>Take away<i class="icon_check_alt2 ok"></i></li>--}}
{{--                                    <li>Delivery<i class="icon_check_alt2 ok"></i></li>--}}
{{--                                </ul>--}}
                            </div>
                        </a><!-- End strip_list-->
                    </div><!-- End col-md-6-->
                    <div class="col-md-6 col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <a class="strip_list grid" href="{{route('menu')}}">
                            <div class="ribbon_1" style="height: 291px; width: 367px">Popular</div>
                            <img src="{{asset('frontend/img/b1.jpg')}}" style="height: 291px; width: 367px" alt="">
                            <div class="desc">
                                <h3 style="margin-top: 10px">Naples Pizza</h3>
                            </div>
                        </a><!-- End strip_list-->
                    </div><!-- End col-md-6-->
                </div><!-- End row-->

                <div class="row">
                    <div class="col-md-6 col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                        <a class="strip_list grid" href="{{route('menu')}}">
                            <div class="ribbon_1" style="height: 291px; width: 367px">Popular</div>
                            <img src="{{asset('frontend/img/b2.jpg')}}" style="height: 291px; width: 367px" alt="">
                            <div class="desc">
                                <h3 style="margin-top: 10px">Japan Food</h3>
                            </div>
                        </a><!-- End strip_list-->
                    </div><!-- End col-md-6-->
                    <div class="col-md-6 col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <a class="strip_list grid" href="{{route('menu')}}">
                            <img src="{{asset('frontend/img/b1.jpg')}}" style="height: 291px; width: 367px" alt="">
                            <div class="desc">
                                <h3 style="margin-top: 10px">Sushi Gold</h3>
                            </div>
                        </a><!-- End strip_list-->
                    </div><!-- End col-md-6-->
                </div><!-- End row-->

                <div class="row">
                    <div class="col-md-6 col-sm-6 wow zoomIn" data-wow-delay="0.5s">
                        <a class="strip_list grid" href="{{route('menu')}}">
                            <img src="{{asset('frontend/img/b1.jpg')}}" style="height: 291px; width: 367px" alt="">
                            <div class="desc">
                                <h3 style="margin-top: 10px">Dragon Tower</h3>
                            </div>
                        </a><!-- End strip_list-->
                    </div><!-- End col-md-6-->
                    <div class="col-md-6 col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                        <a class="strip_list grid" href="{{route('menu')}}">
                            <img src="{{asset('frontend/img/b2.jpg')}}" style="height: 291px; width: 367px" alt="">
                            <div class="desc">
                                <h3 style="margin-top: 10px">China Food</h3>
                            </div>
                        </a><!-- End strip_list-->
                    </div><!-- End col-md-6-->
                </div><!-- End row-->
                <a href="#0" class="load_more_bt wow fadeIn" data-wow-delay="0.2s">Load more...</a>
            </div><!-- End col-md-9-->

        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->


@endsection
@push('js')


@endpush
