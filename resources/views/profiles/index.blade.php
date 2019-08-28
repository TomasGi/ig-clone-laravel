@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <span>Users you might like</span>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($profiles as $profile)
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
                        max-width: 1000px;
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

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <a class="btn btn-secondary" href="/profiles/">More</a>
        </div>
    </div>

</div>
@endsection
