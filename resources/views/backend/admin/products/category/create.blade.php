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
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                    <h3 class="card-title float-left">Add Category</h3>
                    <div class="float-right">
                        <a href="{{route('admin.category.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Category Name <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Department Name">
                        </div>
                        <div class="form-group">
                            <label for="image">Category Image <small class="requiredCustom">*</small></label>
                            <input type="file" class="form-control-file" name="image" id="image" >
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
