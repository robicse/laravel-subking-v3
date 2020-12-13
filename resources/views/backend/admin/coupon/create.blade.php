@extends('backend.layouts.master')
@section("title","Category")
@push('css')
    <style>
        .requiredCustom{
            font-size: 20px;
            color: red;
            margin-top: 20px;
        }
    </style>
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Coupon</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Coupon</li>
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
                    <h3 class="card-title float-left">Add Coupon</h3>
                    <div class="float-right">
                        <a href="{{route('admin.coupon.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.coupon.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="discount_type">Discount Type <small class="requiredCustom">*</small></label>
                            <select class="form-control" name="discount_type">
                                <option value="">Select One</option>
                                <option value="flat">flat</option>
                                <option value="percentage">percentage</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="code">Code <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="code" id="code" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount ($) <small class="requiredCustom">*</small></label>
                            <input type="number" class="form-control" name="amount" id="amount" min="0" max="100" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="expired_date">Expired Date <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="expired_date" id="expired_date" placeholder="YYYY-MM-DD 00:00:00">
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

@endpush
