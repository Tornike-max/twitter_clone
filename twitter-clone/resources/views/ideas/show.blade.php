@extends('layout.layout')

@section('content')

<div class="card my-4">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $user->name }}" alt="{{$user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h5>
                </div>
            </div>
            @auth
            <form method="POST" action="{{route('ideas.destroy',$idea->id)}}">
                @csrf
                @method('delete')
                <a href="{{route('ideas.edit',$idea)}}" class='mx-2 btn btn-success btn-m'>Edit</a>
                <button type="submit" class="btn btn-danger btn-m">X</button>
            </form>
            @endauth
            @guest
            <a href="{{route('login')}}" class="mx-2 btn btn-success btn-m">Login to make actions</a>
            @endguest
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
        </p>
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->format('Y:m:d') }} </span>
            </div>
        </div>
        <div>
            @include('shared.post-comment')
        </div>
    </div>
</div>


@endsection