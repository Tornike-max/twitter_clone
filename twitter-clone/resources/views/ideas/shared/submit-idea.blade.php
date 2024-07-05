@auth
<h4> Share yours ideas </h4>
<form action="{{route('ideas.store')}}" method="POST" class="row">
    @csrf
    <div class="mb-3">
        <textarea name='content' class="form-control" id="idea" rows="3"></textarea>
        @error('content')
        <span class="d-block text-danger fs-6 mt-2"> {{ $message }} </span>
        @enderror
    </div>
    <div class="">
        <button type="submit" class="btn btn-dark"> Share </button>
    </div>
</form>
@endauth

@guest
<h4>{{ trans('ideas.login_to_share') }} </h4>
@endguest