@extends('layouts.backend.app')
@section('title','Laravel :: Post List')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Custom Js -->
    <link rel="stylesheet" href="{{asset('assets/backend/datatable-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.29/sweetalert2.css">
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Post Tables
                @if ( Request::is('author*')  )
                    <small>You can change everything from here.</small>
                @else
                    <small>You can't change anything from here because you don't have permission to change</small>
                @endif
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">ALL POST
                                <span class="badge bg-info"> {{ $posts->count() }}</span>
                            </h3>
                            <div class="pull-right">
                                <a href="{{ route('author.post.create') }}" class="btn btn-block btn-primary">Add New</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="js-exportable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>Is Approved</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    {{--<th>Updated At</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>Is Approved</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    {{--<th>Updated At</th>--}}
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($posts as $key=>$post)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ str_limit($post->title,'10') }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->view_count }}</td>
                                        <td>
                                            @if($post->is_approved == true)
                                                <span class="badge bg-blue">Approved</span>
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->status == true)
                                                <span class="badge bg-blue">Published</span>
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('author.post.show',$post->id) }}" class="btn btn-info waves-effect">
                                                <i class="material-icons">Visibility</i>
                                            </a>
                                            <a href="{{ route('author.post.edit',$post->id) }}" class="btn btn-info waves-effect">
                                                <i class="material-icons">Edit</i>
                                            </a>
                                            <button class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $post->id }})">
                                                <i class="material-icons">Delete</i>
                                            </button>
                                            <form id="delete-form-{{ $post->id }}" action="{{ route('author.post.destroy',$post->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
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
    <script type="text/javascript">
        function deletePost(id) {
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
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush