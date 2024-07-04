@extends('layout.layout')

@section('title','Dashboard')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-nav')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('shared.error-message')
        @include('ideas.shared.submit-idea')
        <hr>
        @if (count($ideas) > 0)
        @foreach ($ideas as $idea)
        <div class="mt-3">
            @include('ideas.shared.idea-card')
        </div>
        @endforeach
        @else
        <div class="mt-3 text-center">
            <h4>Nothing Found!</h4>
        </div>
        @endif


    </div>
    <div class="col-3">
        @include('shared.search')
        @include('shared.follow-card')
    </div>
    <div class="mt-2">
        {{$ideas->withQueryString()->links()}}
    </div>
</div>
@endsection