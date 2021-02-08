<a href="/">Back</a> | <a href="/create_film">Create film</a> | <a href="{{ route('status') }}">Change status</a>
<hr />

@if($films)
    @foreach($films as $film)
    <div>
        {{ $film->title }} |
        <a href="/edit_film/{{ $film->id }}">edit</a> |
        <a href="/delete_film/{{ $film->id }}">delete</a>
    </div>
    @endforeach
@endif
