@extends('Frontend.layouts.master')
@section('title','Edit Password')
@push('css')
    <style>

    </style>
@endpush
@section('content')
    <div class="c-layout-page">
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
        <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-sbold">User Dashboard</h3>
                    <h4 class="">Page Sub Title Goes Here</h4>
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li><a href="shop-customer-dashboard.html">User Dashboard</a></li>
                    <li>/</li>
                    <li class="c-state_active">Jango Components</li>

                </ul>
            </div>
        </div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
        <div class="container">
            <div class="c-layout-sidebar-menu c-theme ">
                <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
                <div class="c-sidebar-menu-toggler">
                    <h3 class="c-title c-font-uppercase c-font-bold">My Profile</h3>
                    <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                        <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span>
                    </a>
                </div>

                @include('Frontend.includes.sidebar')
            </div>
            <div class="c-layout-sidebar-content ">
                <!-- BEGIN: PAGE CONTENT -->
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">Edit Profile</h3>
                    <div class="c-line-left"></div>
                </div>
                <form action="{{route('password.change_password_update')}}" method="post"  class="c-shop-form-1">
                    @csrf
                    <!-- BEGIN: ADDRESS FORM -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                        <!-- END: BILLING ADDRESS -->
                        <!-- BEGIN: PASSWORD -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">Old Password</label>
                                <input type="password" name="old_password"  class="form-control c-square c-theme" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Change Password</label>
                                <input type="password" name="password"  class="form-control c-square c-theme" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Repeat Password</label>
                                <input type="password" name="password_confirmation" class="form-control c-square c-theme" placeholder="Password">

                            </div>
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="form-group col-md-6">--}}
{{--                                <div class="form-line">--}}
{{--                                    <input type="file" id="pro_img" name="pro_img" value="{{Auth::Users()->pro_img}}" class="form-control" placeholder="Enter your Image">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- END: PASSWORD -->
                        <div class="row c-margin-t-30">
                            <div class="form-group col-md-12" role="group">
                                <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Submit</button>
                                <button type="submit" class="btn btn-lg btn-default c-btn-square c-btn-uppercase c-btn-bold">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <!-- END: ADDRESS FORM -->
                </form>
            </div>
        </div>
    </div>
@stop
@push('js')

@endpush
