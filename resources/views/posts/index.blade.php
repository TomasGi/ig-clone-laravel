@extends('layouts.app')

@section('content')
<div class="container">

    <div class="col-xl-8 col-lg-8 mx-auto">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <span>Users you might like</span>
                <a href="/profiles/"><span class="text-secondary font-weight-bold">More</span></a>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($randomProfiles as $profile)
                    <li class="list-group-item ">
                        <div class="d-flex align-text-bottom">
                            <a href="/profile/{{ $profile->id}}">
                                <img class="rounded-circle" src="{{ $profile->profileImage() }}" width="45px" height="45px"
                                     alt="User">
                            </a>
                            <div class="ml-2 overflow-hidden">
                                <div>
                                    <a href="/profile/{{ $profile->id}}">
                                        <span class="text-dark font-weight-bold">{{ $profile->user->username }}</span>
                                    </a>
                                </div>
                                <div style="
                            max-width: 600px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;"
                                     class="text-secondary">{{ $profile->description }}</div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col-xl-8 col-lg-8 mx-auto">
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <a href="/profile/{{ $post->user->id }}">
                                <img class="w-100 rounded-circle"
                                     style="max-width: 50px;"
                                     src="{{ $post->user->profile->profileImage() }}"
                                     alt="User Image">
                            </a>
                        </div>
                        <div>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span>
                        </div>
                    </div>

                </div>
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="card-img-top w-100" alt="...">
                </a>
                <div class="card-body d-flex justify-content-between">
                    <div class="align-self-center">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark font-weight-bold">{{ $post->user->username }}</span>
                        </a>
                        <span>{{ $post->caption }}</span>
                    </div>
                    {{--            TODO:Fix this hack to find if liked by user--}}
                    <hearth-button post-id="{{ $post->id }}" likes-count="{{ $post->likers->count() }}"
                                   likes="{{ (auth()->user()) ? auth()->user()->likes->contains($post->id) : false }}"></hearth-button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
