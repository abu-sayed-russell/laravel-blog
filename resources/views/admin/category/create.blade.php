@extends('layouts.backend.app')
@section('title','Laravel :: Category')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Custom Js -->
    <link rel="stylesheet" href="{{asset('assets/backend/datatable-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.29/sweetalert2.css">
    <style>
        #image_preview {
            display: none;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New Category
                <small>Add new category from here...</small>
            </h1>
            <div class="pull-right">
                <a href="{{ route('admin.category.index') }}" class="btn btn-block btn-primary">Back</a>
            </div>
            <div class="clearfix"></div>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form role="form" action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Titles</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter Title">
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Featured Image</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="file" name="image" id="image" class="image"/>

                                    <div id="image_preview">
                                        <img src="#" id="image-preview" style="width: 266px; height: 136px;"/><br/>
                                        <a id="image_remove" href="#">Remove</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Publish</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>

                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </div>
@endsection

@push('js')
    <!-- DataTables -->
    <script src="{{asset('assets/backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('assets/backend/jquery-datatable.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

@endpush