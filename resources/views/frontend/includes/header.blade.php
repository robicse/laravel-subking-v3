@push('css')
    <style>
        .main-menu ul ul, .main-menu ul .menu-wrapper{
            min-width: 400px !important;
        }
    </style>
@endpush
<header id="map_listing_header">
    <div class="container-fluid">
        <div class="row">
            @php
                $setting = \App\Setting::latest()->first();
                //dd($setting);
                if(!empty($setting)){
                    $dynamic_logo = $setting->logo;
                }else{
                    $dynamic_logo = 'subking-logo.png';
                }
            @endphp
            <div class="col--md-4 col-sm-4 col-xs-4">
                <a href="{{route('index')}}" id="logo">
                    {{--<img src="{{asset('frontend/img/subking-logo.png')}}" width="190" height="43" alt="" data-retina="true" class="hidden-xs">--}}
                    <img src="{{asset('uploads/setting/'.$dynamic_logo)}}" width="160" height="60" alt="" data-retina="true" class="hidden-xs">
                    <img src="{{asset('frontend/img/logo_mobile.png')}}" width="59" height="23" alt="" data-retina="true" class="hidden-lg hidden-md hidden-sm">
                </a>
            </div>
            <nav class="col--md-8 col-sm-8 col-xs-8">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{asset('frontend/img/logo_mobile.png')}}" width="190" height="23" alt="" data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                    <ul>
                        {{--                        <li class="submenu">--}}
                        {{--                            <a href="javascript:void(0);" class="show-submenu">Home<i class="icon-down-open-mini"></i></a>--}}
                        {{--                            <ul>--}}
                        {{--                                <li><a href="index.html">Home Video background</a></li>--}}
                        {{--                                <li><a href="index_2.html">Home Static image</a></li>--}}
                        {{--                                <li><a href="index_3.html">Home Text rotator</a></li>--}}
                        {{--                                <li><a href="index_8.html">Home Layer slider</a></li>--}}
                        {{--                                <li><a href="index_4.html">Home Cookie bar</a></li>--}}
                        {{--                                <li><a href="index_5.html">Home Popup</a></li>--}}
                        {{--                                <li><a href="index_6.html">Home Mobile synthetic</a></li>--}}
                        {{--                                <li><a href="index_7.html">Top Menu version 2</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu" style="font-size: 18px;padding-right: 0px;"><i class="fa fa-shopping-cart" style="margin-right: 2px;" aria-hidden="true"></i>{{Cart::count()}}<i class="icon-down-open-mini"></i></a>
                            <ul style="min-width: 450px">
                                @if(Cart::count()>0)
                                    @foreach(Cart::content() as $product)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 style="margin-left: 10px;">{{$product->name}}</h5>
{{--                                                <p style="margin-left: 10px;font-size: 13px;">bbq suce,tamoto,onion,potato</p>--}}
                                            </div>
                                            <div class="col-md-2">
                                                <h5 style="">${{$product->options->final_price}}</h5>
                                            </div>
{{--                                            <div class="col-md-2">--}}
{{--                                                <a style="margin-top: 0px" href = "{{route('menu.edit',$product->rowId)}}">Edit</a>--}}
                                            {{--                                            </div>--}}
                                            <div class="col-md-2">
                                                <a style="margin-top: 0px" href = "{{route('cart.remove',$product->rowId)}}"><i class="fa fa-trash" aria-hidden="true" style="font-size: 1.7em;"></i></a>
                                            </div>
                                        </div>
                                        {{--                                        <p style="margin-right: 10px;">sauce,hha,dgd,dasdaefd</p>--}}
                                    @endforeach
                                    @if(Cart::count() > 0)
                                        <div class="row">
                                            <div class="col-md-12 text-center" style="padding: 10px">
                                                <button type="button" class="btn btn-secondary" style="width: 180px;background-color: #C58E33" onclick="window.location.href='/order/place/checkout';">Continue to Checkout</button>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="row">
                                        <div class="col-md-12 text-center" style="padding: 10px;padding-bottom: 5px;">
                                            <h4 class="text-danger">No Product in Cart</h4>
                                        </div>
                                        <div class="col-md-12 text-center" style="padding: 10px;padding-top: 0px">
                                                <button type="button" class="btn btn-secondary" style="width: 160px;background-color: #C58E33" onclick="window.location.href='/menu';">Check Our Menu</button>
                                            </div>
                                    </div>
                                @endif
                                    {{--                                        <p style="margin-right: 10px;">sauce,hha,dgd,dasdaefd</p>--}}
                            </ul>
                        </li>
                        <li><a href="{{Session::get('rid') ? route('menu') : route('map')}}"><i class="fa fa-map-marker" style="margin-right: 4px;font-size: 19px;" aria-hidden="true"></i>{{Session::get('rid') ? Session::get('location_title') : 'Find a Location'}}</a></li>
{{--                        <li><a href="{{Session::get('rid') ? route('menu') : route('map')}}">Menu</a></li>--}}
                        <li><a href="{{route('menu.front')}}">Menu</a></li>
{{--                        <li><a href="{{route('about')}}">About us</a></li>--}}
{{--                        <li><a href="{{route('faq')}}">Faq</a></li>--}}
                        <li><a href="{{route('rewards')}}">Rewards</a></li>
                        <li><a id="happy" class="btn btn-danger" style="padding: 4px;background-color: #C58E33;border: 0px;" href="{{Session::get('rid') ? route('menu') : route('map')}}">Order Now</a></li>
                        {{--                        <li class="submenu">--}}
                        {{--                            <a href="javascript:void(0);" class="show-submenu">Pages<i class="icon-down-open-mini"></i></a>--}}
                        {{--                            <ul>--}}
                        {{--                                <li><a href="RTL_version/index.html">RTL version</a></li>--}}
                        {{--                                <li><a href="admin.html">Admin section</a></li>--}}
                        {{--                                <li><a href="submit_driver.html">Submit Driver</a></li>--}}
                        {{--                                <li><a href="#0" data-toggle="modal" data-target="#login_2">User Login</a></li>--}}
                        {{--                                <li><a href="#0" data-toggle="modal" data-target="#register">User Register</a></li>--}}
                        {{--                                <li><a href="detail_page_2.html">Restaurant detail page</a></li>--}}
                        {{--                                <li><a href="blog.html">Blog</a></li>--}}
                        {{--                                <li><a href="contacts.html">Contacts</a></li>--}}
                        {{--                                <li><a href="coming_soon/index.html">Coming soon page</a></li>--}}
                        {{--                                <li><a href="shortcodes.html">Shortcodes</a></li>--}}
                        {{--                                <li><a href="icon_pack_1.html">Icon pack 1</a></li>--}}
                        {{--                                <li><a href="icon_pack_2.html">Icon pack 2</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        {{--                        <li><a href="#0" data-toggle="modal" data-target="#login_2">Login</a></li>--}}
                        {{--                        <li><a href="#0">Purchase this template</a></li>--}}

                    </ul>
                </div><!-- End main-menu -->
            </nav>
        </div><!-- End row -->
    </div><!-- End container -->
</header>
