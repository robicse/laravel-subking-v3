@extends('backend.layouts.master')
@section("title","ShopLocation Edit")
@push('css')
    <style>
        .requiredCustom{
            font-size: 20px;
            color: red;
            margin-top: 20px;
        }
    </style>
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endpush
<style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ShopLocation Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">ShopLocation Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Edit ShopLocation</h3>
                        <div class="float-right">
                            <a href="{{route('admin.shopLocation.index')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-backward"> </i>
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.shopLocation.update',$shopLocations->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Location Title <small class="requiredCustom">*</small></label>
                                <input type="text" class="form-control" name="location_title" value="{{$shopLocations->location_title}}" id="title" placeholder="Enter Post Title">
                            </div>
                            <div class="form-group">
                                <label for="description">Address <small class="requiredCustom">*</small></label>
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                    Change Address?
                                </button>
                                <input type="text" class="form-control" name="address" readonly value="{{$shopLocations->address}}" id="title" placeholder="Enter Post Address">
                            </div>
                            <div class="form-group">
                                <label for="phone no">Phone No <small class="requiredCustom">*</small></label>
                                <input type="text" class="form-control" name="phn_no" value="{{$shopLocations->phn_no}}" id="title" placeholder="Enter Post Phone No">
                            </div>
                            <div class="form-group" style="display: none">
                                <label for="image">Lat</label>
                                <input type="text" class="form-control" name="lat" value="{{$shopLocations->lat}}" id="title" placeholder="Enter Post Lat">
                            </div>
                            <div class="form-group" style="display: none">
                                <label for="image">Lng</label>
                                <input type="text" class="form-control" name="lng" value="{{$shopLocations->lng}}" id="title" placeholder="Enter Post longitude">
                            </div>
                            <div class="form-group">
                                <label for="image">Open Close Time <small class="requiredCustom">*</small></label>
                                <input type="text" class="form-control" name="open_close_time" value="{{$shopLocations->open_close_time}}" id="title" placeholder="Enter Post Open Close Time">
                            </div>
                            <div class="form-group">
                                <label for="pick_up">Pick Up <small class="requiredCustom">*</small></label>
                                <select name="pick_up" id="pick_up" class="form-control">
                                    <option value="1" {{$shopLocations->pick_up==1 ? 'selected':''}}>Yes</option>
                                    <option value="0" {{$shopLocations->pick_up==0 ? 'selected':''}}>No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="delivery">Delivery <small class="requiredCustom">*</small></label>
                                <select name="delivery" id="delivery" class="form-control">
                                    <option value="1" {{$shopLocations->delivery==1 ? 'selected':''}}>Yes</option>
                                    <option value="0" {{$shopLocations->delivery==0 ? 'selected':''}}>No</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Address</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <form method="post" action="{{ route('update.address',$shopLocations['id']) }}">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="text" class="form-control" name="address" value="" id="present_address" placeholder="Enter Post Address">
                                        <input type="hidden" class="form-control" name="lat" id="title" placeholder="Enter Lat">
                                        <input type="hidden" class="form-control" name="lng" id="title" placeholder="Enter longitude">
                                        <br/>
                                        <button class="btn btn-primary" type="submit">Update Address</button>
                                    </div>
                                </form>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
@push('js')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqEEDdypCvLeSVWqN2JGlQ2pMvCCQKG24&libraries=places">
    </script>

    <script src="{{asset('frontend/js/jquery.geocomplete.js')}}"></script>
    <script src="{{asset('backend/plugins/select2/select2.full.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();
        $('.textarea').wysihtml5({
            toolbar: { fa: true }
        })

        $("#present_address").geocomplete({details: "form"});
    </script>
@endpush
