@extends('layout.layout')

@section('content')
<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                    alt="Mario Avatar">
                <div>
                    <form class="d-flex align-items-center gap-2 card-body"
                        action="{{ route('users.update', auth()->user()) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input name="name" value="{{ $user->name }}" class="form-control w-100 " type="text" id="name">
                        <button type="submit" class="btn btn-dark mt-2">
                            Update
                        </button>
                    </form>
                    <span class="fs-6 text-muted">{{'@'. $user->name }}</span>
                    <div class="d-flex align-items-center gap-2">
                        <a href="/">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('users.update', auth()->user()) }}" enctype="multipart/form-data" class="mt-4"
            method="POST">
            @csrf
            @method('PUT')

            <label>Image</label>
            <input name='image' type="file" class="form-control" />
            @error('image')
            <span class="text-danger fs-6">{{ $message }}</span>
            @enderror
            <div>
                <button type="submit" class="btn btn-dark"> Save Image</button>
            </div>
        </form>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <form action="{{ route('users.update', auth()->user()) }}" method="POST" class="row">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <textarea name='bio' class="form-control" id="bio" rows="3"></textarea>
                    @error('bio')
                    <span class="d-block text-danger fs-6 mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-dark"> Save </button>
                </div>
            </form>

            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 120 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ count($user->ideas) }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ count($user->comments) }} </a>
            </div>
            @auth
            @if (auth()->user()->id !== $user->id)
            <div class="mt-3">
                <button class="btn btn-primary btn-sm"> Follow </button>
            </div>
            @endif
            @endauth
        </div>
    </div>
</div>
@endsection