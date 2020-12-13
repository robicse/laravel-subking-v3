@extends('backend.layouts.master')
@section("title","ShopLocation Create")
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
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ShopLocation Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">ShopLocation Create</li>
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
                    <h3 class="card-title float-left">Create ShopLocation</h3>
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
                <form role="form" action="{{route('admin.shopLocation.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Location Title <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="location_title" id="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="present_address">Address <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="address" id="present_address" placeholder="Enter Address">
                        </div>
                        <input type="hidden" class="form-control" name="lat" id="title" placeholder="Enter Lat">
                        <input type="hidden" class="form-control" name="lng" id="title" placeholder="Enter longitude">
                        <div class="form-group">
                            <label for="phone no">Phone No <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="phn_no" id="title" placeholder="Enter Phone No">
                        </div>

                        <div class="form-group">
                            <label for="image">Open Close Time <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="open_close_time" id="title" placeholder="Enter Open Close Time">
                        </div>
                        <div class="form-group">
                            <label for="pick_up">Pick Up <small class="requiredCustom">*</small></label>
                            <select name="pick_up" id="pick_up" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="delivery">Delivery <small class="requiredCustom">*</small></label>
                            <select name="delivery" id="delivery" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
