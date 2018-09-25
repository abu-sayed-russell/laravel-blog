@extends('layouts.backend.app')
@section('title','Laravel :: Add Tag')

@push('css')

@endpush

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Post Tag</h3>
                            <div class="pull-right">
                                <a href="{{ route('admin.tag.index') }}" class="btn btn-block btn-primary">Back</a>
                            </div>
                        </div>
                        {{--@include('admin.messages')--}}
                        <form role="form" action="{{ route('admin.tag.update',$tag->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Tag Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Tag Name" value="{{ $tag->name }}">
                                </div>
                            </div>
                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </section>
    </div>

@endsection

@push('js')

@endpush