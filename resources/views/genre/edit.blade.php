@if($genre)
    <form method="post" action="{{ route('genre_update') }}">
        {{ csrf_field() }}
        <label>Title:</label>
        <input type="text" name="title" value="{{ $genre->title }}" required>
        <input type="hidden" name="id" value="{{ $genre->id }}">
        <input type="submit" value="Send">
    </form>
    @include('errors.genre')
@endif
