@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-nav')
    </div>
    <div class="col-9">
        <h1>Admin Panel</h1>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                @include('shared.widget',[
                'title'=>'Total Users',
                'icon'=>'fas fa-users',
                'data'=>count($totalUsers)
                ])
            </div>
            <div class="col-sm-6 col-md-4">
                @include('shared.widget',[
                'title'=>'Total Ideas',
                'icon'=>'fas fa-lightbulb',
                'data'=>count($totalIdeas)
                ])
            </div>
            <div class="col-sm-6 col-md-4">
                @include('shared.widget',[
                'title'=>'Total Comments',
                'icon'=>'fas fa-comment',
                'data'=>count($totalComments)
                ])
            </div>

        </div>
    </div>

</div>
@endsection