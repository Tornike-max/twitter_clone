<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">{{ trans('ideas.search') }}</h5>
    </div>
    <form action="{{route('dashboard')}}" method="GET" class="card-body">
        <input value="{{ request('searchValue','') }}" name="searchValue" placeholder="..." class="form-control w-100"
            type="text" id="search">
        <button class="btn btn-dark mt-2">
            {{ trans('ideas.search') }}
        </button>
    </form>
</div>