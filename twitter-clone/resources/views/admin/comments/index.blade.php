@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-nav')
    </div>
    <div class="col-9">
        <h1>comments Page</h1>

        <div class="table-responsive mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Creator</th>
                        <th>Idea</th>
                        <th style="width: 300px">Content</th>
                        <th>Created At</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>
                            <a href="{{route('admin.users.show',$comment->user)}}">
                                {{ $comment->user->name }}
                            </a>
                        </td>
                        <td>{{ $comment->idea->id }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->created_at->toDateString() }}</td>
                        <td class="text-center d-flex justify-center align-items-center gap-2">
                            <a href="{{ route('admin.comments.edit',$comment) }}" class="btn btn-primary">Edit</a>
                            <form action="{{route('admin.comments.destroy',$comment)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $comments->links() }}
        </div>
    </div>
</div>
@endsection