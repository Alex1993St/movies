<a href="/">Back</a> | <a href="/create_genre">Create genre</a>
<hr />


@if($genres)
    @foreach($genres as $genre)
    <div>
       {{ $genre->title }} |
        <a href="/edit_genre/{{ $genre->id }}">edit</a> |
        <a href="/delete_genre/{{ $genre->id }}">delete</a>
    </div>
    @endforeach
@endif
