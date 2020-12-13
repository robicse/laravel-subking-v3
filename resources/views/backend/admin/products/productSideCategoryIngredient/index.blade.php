@extends('backend.layouts.master')
@section("title","Subcategory")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subcategory</h1>
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
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Product Side Category Ingredient Lists</h3>
                        <div class="float-right">
                            <a href="{{route('admin.productsidecategoryingredient.create')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Product</th>
                                <th>Side Category</th>
                                <th>Ingredients</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productSideCategoryIngredients as $key => $productSideCategoryIngredient)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$productSideCategoryIngredient->product->name}}</td>
                                <td>{{$productSideCategoryIngredient->side_category->name}}</td>
                                <td>
                                    @php
                                        $ingredient_arrays = explode(',', $productSideCategoryIngredient->ingredient_ids);
                                        $i = 0;
                                        foreach($ingredient_arrays as $ingredient){
                                            $ingredient_id = $ingredient[$i];
                                    @endphp
                                            {{ \App\Ingredient::where('id', $ingredient_id)->pluck('name')->first() }}
                                    @php
                                            echo '<br/>';
                                        }
                                    @endphp
                                </td>
                                <td>
                                    <a class="btn btn-info waves-effect" href="{{route('admin.productsidecategoryingredient.edit',$productSideCategoryIngredient->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger waves-effect" type="button"
                                            onclick="deleteCat({{$productSideCategoryIngredient->id}})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{$productSideCategoryIngredient->id}}" action="{{route('admin.productsidecategoryingredient.destroy',$productSideCategoryIngredient->id)}}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

@stop
@push('js')
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        //sweet alert
        function deleteCat(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your Data is save :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
