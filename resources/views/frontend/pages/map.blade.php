@extends('frontend.layouts.master')
@section('title', 'Order now')
@push('css')

    <link href="{{ asset('frontend/css/skins/square/grey.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <style>
        #filters_map {
            border-bottom: 1px solid #ededed;
            margin: 0 -30px 30px -30px;
            background-color: #C58E33;
            /*padding: 47px 30px 30px 30px;*/
            padding: 100px 30px 30px 30px;
        }

        .search-button {
            height: 40px;
        }

        .search-input-width {
            width: 100%
        }

        .btn-dark {
            background: #0c0c0c;
            color: white;
        }

        .btn-success {
            color: #fff;
            background-color: #C58E33;
            border-color: #C58E33;
        }

        #map {
            height: 100%; /* The height is 400 pixels */
            width: 100%; /* The width is the width of the web page */
        }

        .pickUpButtonHide{
            display: none;
        }
        .deliveryButtonHide{
            display: none;
        }
    </style>



@endpush
@section('content')
    <div class="container-fluid full-height">
        <div class="row row-height">
            <div class="col-lg-6 col-md-6 content-left">
                <div id="filters_map">
                    <div class="input-group search-input-width">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="search" id="present_address" class="form-control"
                                       placeholder="What's your City or ZIP?"/>
                                <div class="form-group">
                                    <input type="hidden" name="lat" class="form-control"
                                           placeholder="Latitude" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="lng" class="form-control"
                                           placeholder="Longitude" readonly>
                                </div>

                                <div class="input-group-btn">
                                    <button class="btn btn-dark search-button" id="btn-submit" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="near_shop_list"></div>
                    </div><!-- End row-->
                </div><!-- End strip_list-->
                {{--<a href="#0" class="load_more_bt_2">Load more...</a>--}}

            </div>
            <!-- End content-left-->

            <div class="col-lg-6 col-md-6 map-right">
                {{--<div id="map_listing"></div>--}}
                <div id="map"></div>
                <!-- map-->
            </div>

        </div>
        <!-- End row-->
    </div>
    <!-- End container-fluid -->



@endsection
@push('js')
    <script src="{{asset('frontend/js/map/map.js')}}" type="text/javascript"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqEEDdypCvLeSVWqN2JGlQ2pMvCCQKG24&libraries=places">
    </script>

    {{-- <script src="https://maps.googleapis.com/maps/api/js"></script>--}}
    {{--<script src="{{asset('frontend/js/map_listing.js')}}"></script>--}}
    <script src="{{asset('frontend/js/infobox.js')}}"></script>
    <script src="{{asset('frontend/js/ion.rangeSlider.js')}}"></script>


    <script src="{{asset('frontend/js/jquery.geocomplete.js')}}"></script>
    <script>


        $(document).ready(function () {
            geoLocationInit();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $("#present_address").geocomplete({details: "form"});

            $("#btn-submit").click(function (e) {

                e.preventDefault();
                var lat = $("input[name=lat]").val();
                var lng = $("input[name=lng]").val();

                $.ajax({
                    url: '/shop/location/near/search',
                    method: 'post',
                    data: {
                        lat: lat,
                        lng: lng,

                    },
                    success: function (data) {
                        console.log(data);
                        myLatLng = new google.maps.LatLng(data.sLat, data.sLng);

                        createMap(myLatLng);
                        if (data.response.length == 0) {
                            $('.near_shop_list').html(`<div class="row">
                                                 <div class="col-md-12 text-center">
                                                     <h6 style="font-size: 20px; color: #C58E33;">We don't have any shop here!!</h6>
                                                 </div>
                                             </div>`);
                        } else {
                            var i;
                            $('.near_shop_list').empty();
                            for (i = 0; i < data.response.length; i++) {
                                var glatval = data.response[i].lat;
                                var glngval = data.response[i].lng;
                                var gname = data.response[i].location_title;
                                var gaddress = data.response[i].address;
                                var pick_up = data.response[i].pick_up;
                                var delivery = data.response[i].delivery;
                                var ami = "0000777888,5656";
                                // both pick up and delivery
                                if(pick_up === 1 && delivery === 1){
                                    var gcontent= `<div class="row mx-1">
                            <div class="col-md-12">
                                <h6 class="m-1 p-0" style="font-size: 14px;line-height: 23px;font-weight: bold;">`+data.response[i].location_title+`</h6>
                                <p class="m-1 p-0" style="font-size: 14px;">`+data.response[i].address+`</p>
                                <button id="p_id_map_`+data.response[i].id+`" class="btn btn-sm px-1" style="border: 2px solid #C58E33;border-radius: 10px;color: #C58E33" title="Picked" onclick="picked(`+data.response[i].id+`)">Pick Up<i class="fa fa-arrow-right ml-1" aria-hidden="true"></i></button>
                                <button id="d_id_map_`+data.response[i].id+`" class="btn btn-sm px-1" style="border: 2px solid #C58E33;border-radius: 10px;color: #C58E33" title="Click To Take This Service" onclick="delivery(`+data.response[i].id+`)">Delivery<i class="fa fa-arrow-right ml-1" aria-hidden="true"></i></button>
                            </div>
                        </div>`;
                                }
                                // only pick up and no delivery
                                if(pick_up === 1 && delivery === 0){
                                    var gcontent= `<div class="row mx-1">
                            <div class="col-md-12">
                                <h6 class="m-1 p-0" style="font-size: 14px;line-height: 23px;font-weight: bold;">`+data.response[i].location_title+`</h6>
                                <p class="m-1 p-0" style="font-size: 14px;">`+data.response[i].address+`</p>
                                <button id="p_id_map_`+data.response[i].id+`" class="btn btn-sm px-1" style="border: 2px solid #C58E33;border-radius: 10px;color: #C58E33" title="Picked" onclick="picked(`+data.response[i].id+`)">Pick Up<i class="fa fa-arrow-right ml-1" aria-hidden="true"></i></button>
                            </div>
                        </div>`;
                                }
                                // no pick up and only delivery
                                if(pick_up === 0 && delivery === 1){
                                    var gcontent= `<div class="row mx-1">
                            <div class="col-md-12">
                                <h6 class="m-1 p-0" style="font-size: 14px;line-height: 23px;font-weight: bold;">`+data.response[i].location_title+`</h6>
                                <p class="m-1 p-0" style="font-size: 14px;">`+data.response[i].address+`</p>
                                <button id="d_id_map_`+data.response[i].id+`" class="btn btn-sm px-1" style="border: 2px solid #C58E33;border-radius: 10px;color: #C58E33" title="Click To Take This Service" onclick="delivery(`+data.response[i].id+`)">Delivery<i class="fa fa-arrow-right ml-1" aria-hidden="true"></i></button>
                            </div>
                        </div>`;
                                }
                                // no pick up and no delivery
                                if(pick_up === 0 && delivery === 0){
                                    var gcontent= `<div class="row mx-1">
                            <div class="col-md-12">
                                <h6 class="m-1 p-0" style="font-size: 14px;line-height: 23px;font-weight: bold;">`+data.response[i].location_title+`</h6>
                                <p class="m-1 p-0" style="font-size: 14px;">`+data.response[i].address+`</p>
                            </div>
                        </div>`;
                                }




                                var gicn = window.location.origin + '/frontend/img/pins/map-marker-sub.png';
                                var GLatLng = new google.maps.LatLng(glatval, glngval);
                                createMarker(GLatLng, gicn, gname, gcontent);
                                // console.log(GLatLng);
                                $('.near_shop_list').append(`<div class="row px-1 mb-3">

                                    <div class="col-md-12 ">
                                         <div class="strip_list">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="mb-1 p-0 pr-2" style="font-size: 22px;line-height: 19px;font-weight: bold;">` + data.response[i].location_title + `</h5>
                                                    <p class="m-0 mb-1 pr-2" style="font-size: 14px;line-height: 15px;display:inline;">` + data.response[i].address + `</p><br>
                                                    <p class="m-0 mb-1 pr-2" style="font-size: 14px;line-height: 15px;display:inline;">` + data.response[i].phn_no + `</p><br>
                                                    <p class="m-0 mb-1 pr-2" style="font-size: 14px;line-height: 15px;display:inline;">` + data.response[i].open_close_time + `</p><br>
                                                </div>
                                                <div class="col-md-3">
                                                   <div style="margin: 5px;" id="p_id_`+data.response[i].id+`"><button style="width: 100%;" onclick="picked(`+data.response[i].id+`)" class="btn btn-success" >Pick Up</button></div>
                                                   <div style="margin: 5px;" id="d_id_`+data.response[i].id+`"><button style="width: 100%;" onclick="delivery(`+data.response[i].id+`)" class="btn btn-success">delivery</button></div>
                                                   <div style="margin: 5px;"><button style="width: 100%;" onclick="shopLocation(`+data.response[i].id+`)"  class="btn btn-success">Location page</button></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                                );

                                if(pick_up === 0){
                                    //console.log("pick_up");
                                    $("#p_id_"+data.response[i].id).addClass("pickUpButtonHide");
                                }
                                if(delivery === 0){
                                    //console.log(delivery);
                                    $("#d_id_"+data.response[i].id).addClass("deliveryButtonHide");
                                }
                                //For list
                            }
                        }
                    }
                });
            });
        })

    </script>
@endpush
