<div class="card my-4">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user) }}"> {{ $idea->user->name
                            }}
                        </a></h5>
                </div>
            </div>
            @auth
            @if (auth()->user()->id === $idea->user->id)
            <form method="POST" action="{{route('ideas.destroy',$idea->id)}}">
                @csrf
                @method('delete')
                <a class="mx-2" href="{{route('ideas.show',$idea)}}">View</a>
                <button type="submit" class="btn btn-danger btn-m">X</button>
            </form>
            @else
            <a class="mx-2" href="{{route('ideas.show',$idea)}}">View</a>
            @endif

            @endauth
            @guest
            <a class="mx-2" href="{{route('login')}}">Login To View Ideas</a>
            @endguest
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
        </p>
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->format('Y:m:d') }} </span>
            </div>
        </div>
        <div>
            @include('shared.post-comment')
            @foreach ($idea->comment as $comment)
            <div class="d-flex align-items-start">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $idea->user->name }}"
                    alt="{{ $idea->user->name }}">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h6 class="">{{ $idea->user->name }}
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
        </div>
    </div>
</div>