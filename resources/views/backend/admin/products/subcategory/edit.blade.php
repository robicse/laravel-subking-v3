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
                <form role="form" action="{{route('admin.subcategory.update',$subcategory->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name <small class="requiredCustom">*</small></label>
                            <input type="name" class="form-control" name="name" id="name" value="{{$subcategory->name}}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category <small class="requiredCustom">*</small></label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{($subcategory->category_id == $category->id)  ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Sub Category Image <small class="requiredCustom">*</small></label>
                            <input type="file" class="form-control-file" name="image" id="image" >
                            <br/>
                            <img src="{{asset('uploads/sub_category/'.$subcategory->image)}}" width="80" height="40" alt="">
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
