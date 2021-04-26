@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5 d-flex justify-content-center align-items-center">
            <img style="border:1px solid #000" class="rounded-circle" width=150px height=150px src="{{$user->user_info->profileImage()}}" alt="">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex pb-4 align-items-center">
                    <div class="h4">{{ $user->username }}</div>
                    <follow-button userid={{$user->id}} follows={{ $follows }}></follow-button>

                </div>
                @can('update', $user->user_info)
                    <a class="customBtn" href="/p/create">Add New</a>
                @endcan
            </div>
            @can('update', $user->user_info)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="mr-4"><strong>{{$user->posts->count()}}</strong>posts</div>
                <div class="mr-4"><strong>{{$user->user_info->user->count()}}</strong>followers</div>
                <div class="mr-4"><strong>{{$user->following->count()}}</strong>following</div>
            </div>
        <div class="pt-4 font-weight-bold">{{$user->user_info->title}}</div>
        <div>{{$user->user_info->bio}}</div>
            <div><a target="_blank" href="#">{{$user->user_info->url}}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach ($user->posts as $item)
            <div class="col-4 pb-4">
            <a href="/p/{{$item->id}}">
                    <img class="w-100" src="/storage/{{$item->image}}" alt="">
                </a>
            </div>
        @endforeach


    </div>

</div>
@endsection
