@extends('backend.layouts.master')
@section("title","SubCategory Edit")
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
                    <h1>SubCategory Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">SubCategory Edit</li>
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
                    <h3 class="card-title float-left">Edit SubCategory</h3>
                    <div class="float-right">
                        <a href="{{route('admin.subcategory.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.ingredient.update',$ingredients->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name <small class="requiredCustom">*</small></label>
                                        <input type="text" class="form-control" name="name" value="{{$ingredients->name}}" id="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="side_category_id">Side Category <small class="requiredCustom">*</small></label>
                                        <select name="side_category_id" id="side_category_id" class="form-control">
                                            <option value="">Select one</option>
                                            @foreach($sideCategories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $ingredients->side_category_id ? 'selected' : '' }} > {{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                {{--<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price_status">Price Status</label>
                                        <select name="price_status" id="price_status" class="form-control">
                                            <option value="0" {{$ingredients->price_status == 0 ? 'selected' : ''}}>No</option>
                                            <option value="1" {{$ingredients->price_status == 1 ? 'selected' : ''}}>Yes</option>
                                        </select>
                                    </div>
                                </div>--}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Price ($) <small class="requiredCustom">*</small></label>
                                        <input type="number" class="form-control" name="price" value="{{$ingredients->price}}" id="price">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status <small class="requiredCustom">*</small></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{$ingredients->status == 1 ? 'selected':''}}>Yes</option>
                                            <option value="0" {{$ingredients->status == 0 ? 'selected':''}}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Image <small class="requiredCustom">*</small></label>
                                        <input type="file" name="image" id="image">
                                        <img src="{{asset('uploads/ingredient/'.$ingredients->image)}}" alt="" height="100px" width="100px"/>
                                    </div>
                                </div>
                            </div>
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
