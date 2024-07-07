@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-nav')
    </div>
    <div class="col-9">
        <div class="card mt-3">
            <div class="card-body text-center">
                <h1 class="card-title">User Details</h1>
                <h5>{{ $user->name }}</h5>
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                    alt="{{ $user->name }}">

                <div class="mt-3 text-left">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Bio:</strong> {{ $user->bio ?? 'Not provided' }}</p>
                    <p><strong>Joined At:</strong> {{ $user->created_at->format('M d, Y') }}</p>
                    <p><strong>Updated At:</strong> {{ $user->updated_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-3 text-center">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Cancel</a>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection