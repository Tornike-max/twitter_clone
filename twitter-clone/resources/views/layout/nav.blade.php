<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>Ideas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">{{
                        auth()->user()->name }}</a>
                </li>
                <form method="POST" action="{{route('logout')}}" class="nav-item">
                    @csrf
                    <button class="px-2 py-1 bg-danger border-danger rounded" aria-current="page">Logout</button>
                </form>
                @endauth

                @guest
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('login') ? 'active' : '' }}" aria-current="page"
                        href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('register') ? 'active' : '' }}" href="/register">Register</a>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>