@extends('frontend.layouts.master')
@section('title', 'Login Register')
@section('content')
    <div class="c-layout-page">
        <div class="container margin_60">
            <div class="main_title margin_mobile">
                <h2 class="nomargin_top" style="margin-top: 10px"><b>Login</b></h2>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="email">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="password">
                                </div>
                            </div>
                        </div>
                        <hr style="border-color:#ddd;">
                        <div class="text-center col-md-6  "><button class="btn_full_outline">Submit</button></div>
                    </form>
                    <div class="text-center col-md-6"><a href="{{route('users.reg.form')}}"><button class="btn_full_outline">Registration</button> </a></div>
                </div><!-- End col  -->
            </div><!-- End row  -->
        </div><!-- End container  -->
        <!-- End Content =============================================== -->

    </div>
@endsection
