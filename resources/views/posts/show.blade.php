@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img class="w-100" src="/storage/{{ $post->image }}" alt="Post Image">
        </div>
        <div class="col-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img class="w-100 rounded-circle"
                             style="max-width: 40px;"
                             src="{{ $post->user->profile->profileImage() }}"
                             alt="User Image">
                    </div>
                    <div>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
{{--                            <span class="pr-1 pl-1">|</span>--}}
{{--                            <a href="#">Follow</a>--}}
                        </span>
                    </div>
                </div>
                <hearth-button post-id="{{ $post->id }}" likes-count="{{ $post->likers->count() }}"
                               likes="{{ $likesPost }}"></hearth-button>
            </div>
            <hr>
            <p>
                <a href="/profile/{{ $post->user->id }}">
                    <span class="text-dark font-weight-bold">{{ $post->user->username }}</span>
                </a>
                {{ $post->caption }}
            </p>
        </div>
    </div>
</div>
@endsection
