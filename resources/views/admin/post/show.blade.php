@extends('layouts.backend.app')
@section('title','Laravel :: Show Post')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.29/sweetalert2.css">
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="pull-left">
                <a href="{{ route('admin.post.index') }}" class="btn btn-primary">Back</a>

            </div>
            <div class="pull-right">
                @if($post->is_approved == false)
                    <button type="button" class="btn btn-success waves-effect pull-right" onclick="approvePost({{ $post->id }})">
                        <i class="fa fa-check"></i>
                        <span>Approve</span>
                    </button>
                    <form method="post" action="{{ route('admin.post.approve',$post->id) }}" id="approval-form" style="display: none">
                        @csrf
                        @method('PUT')
                    </form>
                @else
                    <button type="button" class="btn btn-success pull-right" disabled>
                        <i class="fa fa-check"></i>
                        <span>Approved</span>
                    </button>
                @endif
            </div>
            <div class="clearfix"></div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ $post->title }} </h3>
                                <h4><small>Posted By <strong> <a href="">{{ $post->user->name }}</a></strong> on {{ $post->created_at->toFormattedDateString() }}</small>
                                    </h4>
                            </div>
                            <div class="box-body">
                                {!! $post->body !!}
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Category</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                @foreach($post->categories as $category)
                                    <span class="label bg-green">{{ $category->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tag</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                @foreach($post->tags as $tag)
                                    <span class="label bg-green">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
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
                                    <img src="{{ Storage::disk('local')->url('post/'.$post->image) }}" style="width: 266px; height: 136px;"/><br/>
                                </div>

                            </div>
                        </div>

                    </div>
            </div>

        </section>
    </div>
@endsection

@push('js')
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        function approvePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this post ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The post remain pending :)',
                        'info'
                    )
                }
            })
        }
    </script>
@endpush