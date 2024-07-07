@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-nav')
    </div>
    <div class="col-9">
        <div class="card mt-3">
            <div class="card-body text-center">
                <h1 class="card-title">Idea Details</h1>

                <div class="mt-3 text-left">
                    <p>
                        <strong>Creator:</strong> {{ $idea->user->name }}
                    </p>
                    <p>
                        <strong>Content:</strong> {{ $idea->content ?? 'Not provided' }}
                    </p>
                    <p><strong>Created At:</strong> {{ $idea->created_at->format('M d, Y') }}</p>
                    <p><strong>Updated At:</strong> {{ $idea->updated_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-3 d-flex justify-content-center align-items-center gap-2 text-center">
            <a href="{{ route('admin.ideas.index') }}" class="btn btn-secondary">Cancel</a>
            <a href="{{ route('admin.ideas.edit', $idea) }}" class="btn btn-primary">Edit</a>
            <form action="{{route('admin.ideas.destroy', $idea->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection