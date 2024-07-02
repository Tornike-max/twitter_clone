@extends('layout.layout')

@section('content')
<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                    alt="{{ $user->name }}">
                <div>
                    @if ($user->id === auth()->user()->id)
                    <div class="d-flex align-items-center gap-4">
                        <a href="/">Back</a>
                        <a href="{{ route('users.edit',auth()->user()) }}">Edit User</a>
                    </div>
                    @else
                    <a href="/">Back</a>
                    @endif

                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{'@'. $user->name }}</span>

                </div>
            </div>
        </div>
        <div class=" px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>

            @include('users.shared.user-stats')
            @auth
            @if (auth()->user()->id !== $user->id)
            @if (Auth::user()->follows($user))
            <form action="{{route('users.unfollow',$user->id)}}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm"> Unfollow </button>
            </form>
            @else
            <form action="{{route('users.follow',$user->id)}}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
            </form>
            @endif
            @endif
            @endauth
        </div>
    </div>
</div>

@foreach ($user->ideas as $idea)
<div class="mt-3">
    @include('ideas.shared.idea-card')
</div>
@endforeach
@endsection