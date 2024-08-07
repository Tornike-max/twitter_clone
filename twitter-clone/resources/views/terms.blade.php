@extends('layout.layout')
@section('title','Terms')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-nav')
    </div>

    <div class="col-6">
        <h1>Terms</h1>
        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna
            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur
            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
    </div>

    <div class="col-3">
        @include('shared.search')
        @include('shared.follow-card')
    </div>
</div>
@endsection