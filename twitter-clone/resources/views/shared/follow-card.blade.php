<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">{{ trans('ideas.top_users') }}</h5>
    </div>
    @foreach ($topUsers as $user)
    <div class="card-body">
        <div class="hstack gap-2 mb-2">
            <div class="avatar">
                <a href="#!"><img style="width: 50px" class="avatar-img rounded-circle" src="{{$user->getImageUrl()}}"
                        alt=""></a>
            </div>
            <div class="overflow-hidden">
                <a class="h6 mb-0" href="#!">{{ $user->name }}</a>
                <p class="mb-0 small text-truncate">{{'@' . explode(' ',$user->name)[0] }}</p>
            </div>
            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus">
                </i></a>
        </div>
        <hr />
    </div>
    @endforeach
    <div class="d-grid mt-3">
        <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
    </div>
</div>