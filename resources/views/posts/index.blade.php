@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $item)
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <div class="card">
                    <a href="/p/{{$item->id}}">
                            <img style="object-fit: cover" width="400px" height="550px" class="card-img-top" src="/storage/{{ $item->image}}" alt="Card image cap">
                        </a>
                        <div class="card-action d-flex align-items-center">
                            <img src="{{$item->user->user_info->profileImage()}}" width="30px" height="30px" class="rounded-circle" alt="">
                            <div class="justify-self-between font-weight-bold">
                                <a href="/profile/{{$item->user->id}}">
                                    <span class="pl-3 text-dark">{{$item->user->username}}</span>
                                </a>
                                <a href="" class="pl-3">Follow</a>
                            </div>
                    </div>
                  </div>
                </div>


            </div>
            {{-- <div class="row">
                <div class="col-4">
                    <div>
                        <div class="d-flex align-itams.center">
                            <div class="pr-3">
                            <img src="{{$item->user->user_info->profileImage()}}" class="rounded-circle w-100" alt="">
                            </div>
                            <div>
                                <div class="font-weight-bold">
                                    <a href="/profile/{{$item->user->id}}">
                                    <span class="text-dark">{{$item->user->username}}</span>
                                    </a>
                                    <a href="" class="pl-3">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        @endforeach
        <div class="row">
            <div class="col-12">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
