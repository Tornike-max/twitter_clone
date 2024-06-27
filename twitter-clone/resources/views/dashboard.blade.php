@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-nav')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('shared.error-message')
        @include('shared.submit-idea')
        <hr>
        @foreach ($ideas as $idea)
        <div class="mt-3">
            @include('shared.idea-card')
        </div>
        @endforeach

    </div>
    <div class="col-3">
        @include('shared.search')
        @include('shared.follow-card')
    </div>
    <div class="mt-2">
        {{$ideas->links()}}
    </div>
</div>
@endsection