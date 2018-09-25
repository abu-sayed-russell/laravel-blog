@extends('layouts.backend.app')
@section('title','Laravel :: Post List')

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/backend/bower_components/select2/dist/css/select2.min.css')}}">
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
                Add New Post
                <small>Add new post from here...</small>
            </h1>
            <div class="pull-right">
                <a href="{{ route('author.post.index') }}" class="btn btn-block btn-primary">Back</a>
            </div>
            <div class="clearfix"></div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form role="form" action="{{ route('author.post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Titles</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="Enter Title" value="{{ $post->title }}">
                                </div>

                            </div>

                        </div>
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Description
                                    <small>Simple and fast</small>
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse"
                                            data-toggle="tooltip"
                                            title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">

                <textarea id="editor1" name="body" placeholder="Place some text here"
                          style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $post->body }}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Publish</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="published">
                                        <input type="checkbox" id="published" class="minimal" name="status" value="1" {{ $post->status == true ? 'checked' : '' }}>
                                        Publish
                                    </label>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </div>
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
                                <div class="form-group {{ $errors->has('categories') ? 'focused error' : '' }}">
                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="Select a State"
                                            style="width: 100%;" name="categories[]">
                                        @foreach($categories as $category)
                                            <option
                                                    @foreach($post->categories as $postCategory)
                                                    {{ $postCategory->id == $category->id ? 'selected' : '' }}
                                                    @endforeach
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                                <div class="form-group {{ $errors->has('tags') ? 'focused error' : '' }}">
                                    <select class="form-control select2" multiple="multiple"
                                            data-placeholder="Select a State"
                                            style="width: 100%;" name="tags[]">
                                        @foreach($tags as $tag)
                                            <option
                                                    @foreach($post->tags as $postTag)
                                                    {{ $postTag->id == $tag->id ? 'selected' :'' }}
                                                    @endforeach
                                                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Update Featured Image</h3>

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

                    </div>
                </form>
            </div>

        </section>
    </div>
@endsection

@push('js')
    <script src="{{asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/backend/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('editor1');
            $('.select2').select2();
        });

    </script>
@endpush