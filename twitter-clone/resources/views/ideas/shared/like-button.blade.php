@auth
<div>
    @if (auth()->user()->likesIdea($idea))
    <form action="{{ route('ideas.unlike',$idea->id) }}" method="POST">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
            </span> {{ count($idea->likes) === 0 ? '' : count($idea->likes)}}
        </button>
    </form>
    @else
    <form action="{{ route('ideas.like',$idea->id) }}" method="POST">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
            </span> {{ $idea->likes_count === 0 ? '' : $idea->likes_count }}
        </button>
    </form>
    @endif
</div>
@endauth

@guest
<a href="{{route('login')}}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
    </span> {{ $idea->likes_count === 0 ? '' : $idea->likes_count }}
</a>
@endguest