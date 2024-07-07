@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-nav')
    </div>
    <div class="col-9">
        <h1 class="card-title">Edit Idea {{ '#'.$idea->id }}</h1>
        <div class="card mt-3">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.ideas.update', $idea->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-3">
                        <label for="content">Content</label>
                        <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content"
                            name="content">{{old('content', $idea->content)}}</textarea>
                        @error('name')
                        <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Save Change</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection