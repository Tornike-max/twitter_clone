@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-nav')
    </div>
    <div class="col-9">
        <h1>Ideas Page</h1>

        <div class="table-responsive mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width: 300px">Content</th>
                        <th>Creator</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ideas as $idea)
                    <tr>
                        <td>{{ $idea->id }}</td>
                        <td>{{ $idea->content }}</td>
                        <td>
                            <a href="{{route('admin.users.show',$idea->user)}}">
                                {{ $idea->user->name }}
                            </a>
                        </td>
                        <td>{{ $idea->created_at->toDateString() }}</td>
                        <td class="text-center ">
                            <a href="{{ route('admin.ideas.show',$idea) }}" class="btn btn-primary">Show</a>
                            <a href="{{route('admin.ideas.edit',$idea)}}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $ideas->links() }}
        </div>
    </div>
</div>
@endsection