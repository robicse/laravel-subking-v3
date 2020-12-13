@extends('frontend.layouts.master')
@section('title','Dashboard')
@push('css')
    <!-- SPECIFIC CSS -->
    <link href="{{asset('frontend/css/skins/square/grey.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/dropzone.css')}}" rel="stylesheet">
@endpush
@section('content')
    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{asset('frontend/img/about.png')}}" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>User Dashboard</h1>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->
    <!-- Content ================================================== -->
    <div class="container margin_60">
        <div id="tabs" class="tabs">
            <nav>
                <ul>
                    <li><a href="#section-2" class="icon-profile"><span>Profile</span></a>
                    </li>
                    <li><a href="#section-1" class="icon-menut-items"><span>Menu</span></a>
                    </li>
                    <li><a href="#section-3" class="icon-settings"><span>Settings</span></a>
                    </li>
                </ul>
            </nav>
            <div class="content">

                <section id="section-2">
                    <div class="indent_title_in">
                        <i class="icon_document_alt"></i>
                        <h3>Edit Profile list</h3>
                    </div>
                    <form action="{{route('update.profile')}}" method="post"  class="c-shop-form-1">
                        @csrf
                        <div class="wrapper_indent">
                            <div class="strip_menu_items">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="menu-item-pic dropzone">
                                            <input name="file" type="file">
                                            <div class="dz-default dz-message"><span>Click or Drop<br>Images Here</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">

                                                <div class="col-md-8 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label>Mobile Number</label>
                                                        <input type="text" name="mobile_number" value="{{Auth::user()->mobile_number}}" class="form-control">
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                </div><!-- End row -->
                            </div><!-- End strip_menu_items -->
                        </div><!-- End wrapper_indent -->
                        <hr class="styled_2">
                        <div class="wrapper_indent">
                            <button type="submit" class="btn_1">Submit</button>
                        </div><!-- End wrapper_indent -->
                    </form>
                </section><!-- End section 2 -->
                <section id="section-1">
                    <div class="indent_title_in">
                        <i class="icon_house_alt"></i>
                        <h3>Order History</h3>
                        <div class=" table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </section><!-- End section 1 -->


                <section id="section-3">

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-6 add_bottom_15">
                            <div class="indent_title_in">
                                <i class="icon_lock_alt"></i>
                                <h3>Change your password</h3>
                            </div>
                            <div class="wrapper_indent">
                                <form action="{{route('password.change_password_update')}}" method="post"  class="c-shop-form-1">
                                    @csrf
                                <div class="form-group">
                                    <label>Old password</label>
                                    <input class="form-control" name="old_password" id="old_password" type="password">
                                </div>
                                <div class="form-group">
                                    <label>New password</label>
                                    <input class="form-control" name="password" id="new_password" type="password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm new password</label>
                                    <input class="form-control" name="password_confirmation" id="confirm_new_password" type="password">
                                </div>
                                <button type="submit" class="btn_1 green">Update Password</button>
                                </form>
                            </div><!-- End wrapper_indent -->

                        </div>

                    </div><!-- End row -->
                </section><!-- End section 3 -->

            </div><!-- End content -->
        </div>
    </div><!-- End container  -->
    <!-- End Content =============================================== -->
@stop
@push('js')
    <script src="{{asset('frontend/js/tabs.js')}}"></script>
    <script>
        new CBPFWTabs(document.getElementById('tabs'));
    </script>

    <script src="{{asset('frontend/js/bootstrap3-wysihtml5.min.js')}}"></script>
    <script type="text/javascript">
        $('.wysihtml5').wysihtml5({});
    </script>
    <script src="{{asset('frontend/js/dropzone.min.js')}}"></script>
    <script>
        if ($('.dropzone').length > 0) {
            Dropzone.autoDiscover = false;
            $("#photos").dropzone({
                url: "upload",
                addRemoveLinks: true
            });

            $("#logo_picture").dropzone({
                url: "upload",
                maxFiles: 1,
                addRemoveLinks: true
            });

            $(".menu-item-pic").dropzone({
                url: "upload",
                maxFiles: 1,
                addRemoveLinks: true
            });
        }
    </script>
@endpush
