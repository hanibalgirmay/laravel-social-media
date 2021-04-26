@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new post</h1>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Add Post')}}</div>
                    <div class="card-body">
                        <form method="post" action="/p" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Caption') }}</label>

                                <div class="col-md-6">
                                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="name" autofocus>

                                    @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-3">
                                <button type="submit" class="d-flex justify-content-end btn btn-primary">Add New Post</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
