@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>show</h1>
        <div class="row">
            <div class="col-8">
                <img class="w-100" src="/storage/{{$post->image}}" alt="">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <img width="60px" height="60px" class="rounded-circle mr-2" src="{{$post->user->user_info->profileImage()}}" alt="">
                    <h5 class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></h5>
                    <div class="d-flex" height=100%>
                        <a class="pl-3 align-self-center" href="#">Follow</a>
                    </div>
                </div>
                <hr />

                <p><span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark pr-2">{{$post->user->username}}</span></a></span>{{$post->caption}}</p>
            </div>
        </div>
    </div>
@endsection
