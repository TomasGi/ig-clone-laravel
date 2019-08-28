@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 p-4 text-center">
                <img src="{{ $user->profile->profileImage() }}" height="150px" width="150px" alt="user"
                     class="d-block m-auto rounded-circle">
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
        </div>
        <div class="col-8 pt-5 align-items-center">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center mb-2">
                    <div class="h2">{{ $user->username }}</div>
                    @cannot('update', $user->profile)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endcannot
                </div>

                @can('update', $user->profile)
                    <a href="/p/create/">+ New Post</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong id="followers-count">{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img class="w-100" src="/storage/{{ $post->image }}" alt="post">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
