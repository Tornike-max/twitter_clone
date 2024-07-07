@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-nav')
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Edit Comment</h1>

                <form method="POST" action="{{ route('admin.comments.update', $comment->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-3">
                        <label for="content">Content</label>
                        <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content"
                            name="content">{{old('content', $comment->content)}}
                        </textarea>
                        </textarea>
                        @error('content')
                        <span class="invalid-feedback fs-6">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection