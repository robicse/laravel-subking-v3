@extends('Frontend.layouts.master')
@section('title', ' Register')
@section('content')
    <div class="c-layout-page">
        <div class="container margin_60">
            <div class="main_title margin_mobile">
                <h2 class="nomargin_top" style="margin-top: 10px"><b>User Registration</b></h2>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form method="post" action="{{ route('users.reg.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="email">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input type="text" id="present_address" name="address" class="form-control" placeholder="address">
                                </div>
                                <input type="hidden" class="form-control" name="lat" id="title" placeholder="Enter Lat">
                                <input type="hidden" class="form-control" name="lng" id="title" placeholder="Enter longitude">
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="password">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <input type="password" id="password" name="password_confirmation" class="form-control" placeholder="password">
                                </div>
                            </div>
                        </div>
                        <hr style="border-color:#ddd;">
                        <div class="text-center col-md-8 col-md-offset-2"><button class="btn_full_outline">Register</button></div>
                    </form>
                </div><!-- End col  -->
            </div><!-- End row  -->
        </div><!-- End container  -->
        <!-- End Content =============================================== -->

    </div>
@endsection



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
