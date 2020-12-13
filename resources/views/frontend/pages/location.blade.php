@extends('frontend.layouts.master')
@section('title', 'Store location')
@push('css')
    <style>
        .bg-img {
            position: relative;
            font-family: Arial;
        }
        .text-block {
            position: absolute;
            bottom: 20%;
            right: 10%;
            left: 10%;
            background-color: whitesmoke;
            color: black;
            padding:10% 10% 10% 10%;
        }
        .btn-success {
            color: #fff;
            background-color: #C58E33;
            border-color: #C58E33;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid container-top" style=" padding:0 0 0 0; margin-top: 0px">
        <div class="col-md-12 nopadding">
            <div class="col-md-6 nopadding">
                <div class="bg-img" style="background-image:url({{asset('frontend/img/food.jpg')}});height: 720px">
                    <div class="text-block">
                        <h3>{{$shopLocation->location_title}}</h3>
                        <p>{{$shopLocation->address}}</p>
                        <p>{{$shopLocation->phn_no}}</p>
                        <p>{{$shopLocation->open_close_time}}</p>
                        <p>Online ordering is unavailable at this time. Please use the location finder to try another location nearby.</p>
                        <div  style="margin: 5px; {{$shopLocation->pick_up == 0 ? 'display: none;' : ''}}"><button style="width: 100%;" onclick="picked({{$shopLocation->id}})" class="btn btn-success" >Pick Up</button></div>
                        <div style="margin: 5px; {{$shopLocation->delivery == 0 ? 'display: none;' : ''}}"><button style="width: 100%; " onclick="delivery({{$shopLocation->id}})" class="btn btn-success">Delivery</button></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="map" style="height: 720px">
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('frontend/js/map/map.js')}}" type="text/javascript"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqEEDdypCvLeSVWqN2JGlQ2pMvCCQKG24&libraries=places">
    </script>
    <script>

        var latval = {{$shopLocation->lat}};
        var lngval = {{$shopLocation->lng}};

        myLatLng = new google.maps.LatLng(latval, lngval);

        createMap(myLatLng);
        function createMap(myLatLng) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 15,
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: window.location.origin+'/frontend/img/pins/map-marker-sub.png',
                title: "{{$shopLocation->address }}",
            });
        }
    </script>

@endpush
