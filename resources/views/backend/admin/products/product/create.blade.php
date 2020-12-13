@extends('backend.layouts.master')
@section("title","Product Create")
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
                    <h1>Product Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product Create</li>
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
                    <h3 class="card-title float-left">Back</h3>
                    <div class="float-right">
                        <a href="{{route('admin.product.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <form role="form" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name <small class="requiredCustom">*</small></label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="side_category_id">Category <small class="requiredCustom">*</small></label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">Select one</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price_status">Sub Category <small class="requiredCustom">* Only For Subs</small></label>
                                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                                <option value="">Select one</option>
                                                @foreach($subCategories as $subCategory)
                                                    <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">Price ($) <small class="requiredCustom">*</small></label>
                                            <input type="number" class="form-control" name="price" id="price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Image <small class="requiredCustom">*</small></label>
                                            <input type="file" name="image" id="image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <small class="requiredCustom">*</small></label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="single">Single <small class="requiredCustom">*</small></label>
                                            <select name="single" id="single" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div id="single_div">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="single">Single Name</label>
                                                            <input type="text" name="single_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="single">Single Price ($)</label>
                                                            <input type="number" name="single_price" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="single">Single Image</label>
                                                            <input type="file" name="single_image" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Double <small class="requiredCustom">*</small></label>
                                            <select name="double" id="double" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div id="double_div">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="single">Double Name</label>
                                                            <input type="text" name="double_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="single">Double Price ($)</label>
                                                            <input type="number" name="double_price" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="single">Double Image</label>
                                                            <input type="file" name="double_image" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script>
        // show category depends on sub category
        $('#category_id').change(function(){
            var category_id = $(this).val();
            $.ajax({
                url : "{{URL('sub-category-list')}}",
                method : "get",
                data : {
                    category_id : category_id
                },
                success : function (result){
                    console.log(result)
                    $('#sub_category_id').html(result.data);
                },
                error : function (err){
                    console.log(err)
                }
            })

        })

        // single status
        $('#single_div').hide();
        $('#single').change(function(){
            var singleValue = $(this).val();
            if(singleValue == 1) {
                $('#single_div').show();
            } else {
                $('#single_div').hide();
            }
        });

        // single status
        $('#double_div').hide();
        $('#double').change(function(){
            var doubleValue = $(this).val();
            if(doubleValue == 1) {
                $('#double_div').show();
            } else {
                $('#double_div').hide();
            }
        });
    </script>
@endpush
