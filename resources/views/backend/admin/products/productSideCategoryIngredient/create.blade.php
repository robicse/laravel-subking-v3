@extends('backend.layouts.master')
@section("title","Subcategory")
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
                    <h1>Product Side Category Ingredient</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product Side Category Ingredient</li>
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
                    <h3 class="card-title float-left">Add Product Side Category Ingredient</h3>
                    <div class="float-right">
                        <a href="{{route('admin.productsidecategoryingredient.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.productsidecategoryingredient.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category_id">Product <small class="requiredCustom">*</small></label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="">Select one</option>
                                @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Side Category <small class="requiredCustom">*</small></label>
                            <select name="side_category_id" id="side_category_id" class="form-control">
                                <option value="">Select one</option>
                                @foreach($sideCategories as $sideCategory)
                                    <option value="{{$sideCategory->id}}">{{$sideCategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Ingredient <small class="requiredCustom">*</small></label>
                            <select name="ingredient_ids[]" id="ingredient_ids" class="form-control" multiple>
                                <option value="">Select one</option>
                                @foreach($ingredients as $ingredient)
                                    <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                @endforeach
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
    <script>
        // show category depends on sub category
        $('#side_category_id').change(function(){
            var side_category_id = $(this).val();
            $.ajax({
                url : "{{URL('ingredient-list')}}",
                method : "get",
                data : {
                    side_category_id : side_category_id
                },
                success : function (result){
                    console.log(result)
                    $('#ingredient_ids').html(result.data);
                },
                error : function (err){
                    console.log(err)
                }
            })

        })
    </script>
@endpush
