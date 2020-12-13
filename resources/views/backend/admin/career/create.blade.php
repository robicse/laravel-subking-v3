@extends('backend.layouts.master')
@section("title","Career")
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
                    <h1>Career</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Career</li>
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
                    <h3 class="card-title float-left">Add Career</h3>
                    <div class="float-right">
                        <a href="{{route('admin.career.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.career.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="education">Education <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="education" id="education">
                        </div>
                        <div class="form-group">
                            <label for="experience">Experience <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="experience" id="experience">
                        </div>
                        <div class="form-group">
                            <label for="deadline">Dateline <small class="requiredCustom">*</small></label>
                            <input type="text" class="form-control" name="deadline" id="deadline" placeholder="YYYY-MM-DD 00:00:00">
                        </div>
                        <div class="form-group">
                            <label for="deadline">Detail <small class="requiredCustom">*</small></label>
                            <textarea class="form-control" cols="10" name="detail" id="checklist_content"></textarea>
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
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace('checklist_content');

            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();

        });
    </script>
@endpush
