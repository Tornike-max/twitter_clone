<div class="card overflow-hidden">

    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item ">
                <a class="nav-link {{ Route::is('dashboard') ? 'text-white bg-primary rounded' : 'bg-none text-dark' }}"
                    href="{{ route('dashboard') }}">
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ Route::is('feed') ? 'text-white bg-primary rounded' : 'bg-none text-dark' }}"
                    href="{{ route('feed') }}">
                    <span>Feed</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ Route::is('popular') ? 'text-white bg-primary rounded' : 'bg-none text-dark' }}"
                    href="{{ route('popular') }}">
                    <span>Popular Posts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('terms') ? 'text-white bg-primary rounded' : 'bg-none text-dark' }}"
                    href="{{ route('terms') }}">
                    <span>Terms</span>
                </a>
            </li>
        </ul>

    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="{{route('lang','en')}}">
            <span class="flag-icon flag-icon-gb"></span>
            <span>GB</span>
        </a>
        <a class="btn btn-link btn-sm" href="{{route('lang','es')}}">
            <span class="flag-icon flag-icon-es"></span>
            <span>ES</span>
        </a>
        <a class="btn btn-link btn-sm" href="{{route('lang','ka')}}">
            <span class="flag-icon flag-icon-ge"></span>
            <span>GE</span>
        </a>
    </div>
</div>