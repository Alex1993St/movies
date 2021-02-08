@if($genre)
    <form method="post" action="{{ route('genre_update') }}">
        {{ csrf_field() }}
        <input type="text" name="title" value="{{ $genre->title }}">
        <input type="hidden" name="id" value="{{ $genre->id }}">
        <input type="submit" value="Send">
    </form>
@endif
