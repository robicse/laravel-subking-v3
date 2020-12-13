@extends('Frontend.layouts.master')
@section('title','Services order history')
@push('css')
    <style>

    </style>
@endpush
@section('content')
    <!-- BEGIN: PAGE CONTAINER -->
    <div class="c-layout-page">
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
        <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-sbold">Order History</h3>
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li><a href="#">Dashboard</a></li>
                    <li>/</li>
                    <li class="c-state_active">Services Order History</li>

                </ul>
            </div>
        </div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
        <div class="container">
            <div class="c-layout-sidebar-menu c-theme ">
                <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
                <div class="c-sidebar-menu-toggler">
                    <h3 class="c-title c-font-uppercase c-font-bold">Services order history</h3>
                    <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                        <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span>
                    </a>
                </div>

                @include('Frontend.includes.sidebar')
            </div>
            <div class="c-layout-sidebar-content ">
                <!-- BEGIN: PAGE CONTENT -->
                <!-- BEGIN: CONTENT/SHOPS/SHOP-ORDER-HISTORY -->
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">Service Order History</h3>
                    <div class="c-line-left"></div>
                </div>
                <div class="row c-margin-b-40">
                    <div class="c-content-product-2 c-bg-white">
                        <div class="c-content-product c-bg-gray table-responsive">
                            <table class="table table-bordered table-condensed table-hover  table-striped" style="width: 98%">
                                <tr>
                                    <th>Id</th>
                                    <th>Date & Time</th>
                                    <th>Service Name</th>
                                    <th>Grand Total</th>
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Details</th>
                                </tr>
                                @forelse($orderHistory as $key => $orderHist)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$orderHist->created_at}}</td>
                                        <td>{{$orderHist->serviceOrder->service->name}}</td>
                                        <td>{{$orderHist->grand_total + $orderHist->delivery_cost}}</td>
                                        <td>{{ucfirst($orderHist->grand_total)}}</td>
                                        <td>{{$orderHist->payment_status == 0 ? 'Not Paid' : 'Paid'}}</td>
                                        <td>{{$orderHist->delivery_status}}</td>
                                        <td>
                                            <a target="_blank" href="{{route('service.order.details',$orderHist->id)}}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> |
                                            <a href="#"   data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Send Your Comments :) </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="{{route('feedback.store')}}" enctype="multipart/form-data" method="post" >
                                                        @csrf
                                                        <div class="card-body">

                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" name="service_id" value="{{$orderHist->serviceOrder->service_id}}" id="title" placeholder="Enter Post Title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="comments">Comments</label>
                                                                <br>
                                                                <textarea type="text" class="form-control" name="comments" id="comments"> </textarea>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
{{--                                                <div class="modal-footer">--}}
{{--                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <h1 class="text-danger">Empty Order History!</h1>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>

                <!-- END: CONTENT/SHOPS/SHOP-ORDER-HISTORY -->
                <!-- END: PAGE CONTENT -->
            </div>
        </div>
    </div>

@stop
@push('js')

@endpush
