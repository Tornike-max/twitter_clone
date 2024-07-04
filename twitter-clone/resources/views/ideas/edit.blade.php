@extends('layout.layout')

@section('content')

<div class="card my-4">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageUrl() }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <form method="POST" action="{{route('ideas.destroy',$idea)}}">
                @csrf
                @method('delete')
                <a class="mx-2" href="{{route('ideas.show',$idea)}}">Go Back</a>
                <button type="submit" class="btn btn-danger btn-m">X</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        @auth
        <form action="{{route('ideas.update',$idea)}}" method="POST" class="row">
            @csrf
            @method('put')
            <div class="mb-3">
                <textarea name='content' class="form-control" id="idea" rows="3">{{ $idea->content }}</textarea>
                @error('content')
                <span class="d-block text-danger fs-6 mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Update </button>
            </div>
        </form>
        @endauth
        <div class="d-flex justify-content-between mt-2">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ count($idea->likes) }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->format('Y:m:d') }} </span>
            </div>
        </div>
        <div>
            @auth
            <form action="/store" method="POST" class="row">
                @csrf
                <div class="mb-3">
                    <textarea name='content' class="form-control" id="idea" rows="3"></textarea>
                    @error('content')
                    <span class="d-block text-danger fs-6 mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Share </button>
                </div>
            </form>
            @endauth
            @guest
            <a href={{route('login')}} class="d-block text-success fs-6 mt-2"> Login to post idea </a>
            @endguest

            <hr>

            @foreach ($idea->comment as $comment)
            <div class="d-flex align-items-start">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageUrl() }}"
                    alt="Luigi Avatar">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h6 class="">{{ $comment->user->name}}
                        </h6>
                        <small class="fs-6 fw-light text-muted"> {{
                            \Carbon\Carbon::parse($idea->created_at)->diffForHumans()}} </small>
                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        {{ $comment->content }}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>


@endsection