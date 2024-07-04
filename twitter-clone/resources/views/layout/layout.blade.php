<!DOCTYPE html>
<html lang="EN">

@include('layout.head')

<body>
    @include('layout.nav')
    <div class="container py-4">
        @yield('content')
    </div>
    @include('layout.footer')
</body>

</html>