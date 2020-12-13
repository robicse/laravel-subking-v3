@extends('backend.layouts.master')
@section("title","products")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Order Details</li>
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
                        <h3 class="card-title float-left">Orders Users</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>First Name</th>
                                    <td>{{$order->first_name}}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{$order->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$order->email}}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{$order->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Process</th>
                                    <td>{{$order->shipping_process}}</td>
                                </tr>
                                <tr>
                                    <th>Total Amount ($)</th>
                                    <td>{{$order->total_amount}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Information</th>
                                    <td>
                                        @php
                                            $shipping_information = json_decode($order->shipping_information);
                                            if(!empty($shipping_information)){
                                                foreach ($shipping_information as $key2 => $value2)
                                                {
                                                    echo '<pre>';
                                                    //print_r($key2);
                                                    print_r($value2);
                                                    echo '</pre>';
                                                }
                                            }
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Orders Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_details as $order_detail)
                            <tr>
                                <th>Product</th>
                                <td>{{$order_detail->product->name}}</td>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <td>{{$order_detail->qty}}</td>
                            </tr>
                            <tr>
                                <th>Price ($)</th>
                                <td>{{$order_detail->price}}</td>
                            </tr>
                            <tr>
                                <th>Product Image</th>
                                <td>
                                    @php
                                        $product_image = \App\Product::where('id',$order_detail->product_id)->pluck('image')->first();
                                    @endphp
                                    <img src="{{asset('uploads/product/'.$product_image)}}" width="80" height="40" alt="">
                                </td>
                            </tr>
                            <tr>
                                <th>Ingredients</th>
                                <td>
                                    @php
                                        $ingredient_arrays = json_decode($order_detail->ingredient_ids);
                                    @endphp
                                    <ol>
                                        @foreach($ingredient_arrays as $ingredient)
                                            @php
                                                $ingredient_image = \App\Ingredient::where('name',$ingredient)->pluck('image')->first();
                                            @endphp
                                            <li>
                                                <img src="{{asset('uploads/ingredient/'.$ingredient_image)}}" width="80" height="80" alt=""> {{$ingredient}}
                                            </li>
                                        @endforeach
                                    </ol>
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
        function deleteProduct(id) {
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
