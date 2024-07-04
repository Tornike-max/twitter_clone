@auth
<form class="mt-2" action="{{route('ideas.comments.store',$idea->id)}}" method="POST">
    @csrf
    <div class="mb-3">
        <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
    </div>
    <div>
        <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
    </div>
</form>
@endauth

<hr>
@if ($showComments)
@foreach ($comments as $comment)
<div class="d-flex align-items-start">
    <img style="width:35px" class="me-2 avatar-sm rounded-circle"
        src="{{ $comment->user->id === auth()->user()->id ? $comment->user->getImageUrl() : "
        https://api.dicebear.com/6.x/fun-emoji/svg?seed={$user->name}" }}"
    alt="{{$user->name }}">
    <div class="w-100">
        <div class="d-flex justify-content-between">
            <h6 class="">{{ $user->name }}
            </h6>
            <small class="fs-6 fw-light text-muted"> {{
                \Carbon\Carbon::parse($comment->created_at)->diffForHumans()}} </small>
        </div>
        <p class="fs-6 mt-3 fw-light">
            {{ $comment->content }}
        </p>
        <hr>
    </div>
</div>
@endforeach
@endif