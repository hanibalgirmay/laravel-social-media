@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Edit Profile')}}</div>
                    <div class="card-body">
                    <form method="post" action="/profile/{{$user->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->title}}"  autocomplete="off" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                                <div class="col-md-6">
                                    <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') ?? $user->bio }}"  autocomplete="off" autofocus>

                                    @error('bio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Url') }}</label>

                                <div class="col-md-6">
                                    <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->url }}"  autocomplete="off" autofocus>

                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="profile_image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>

                                <div class="col-md-6">
                                    <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" value=""  autocomplete="off" autofocus>

                                    @error('profile_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-3">
                                <button type="submit" class="d-flex justify-content-end btn btn-primary">Save Profile</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
