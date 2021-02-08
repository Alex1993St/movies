<a href="/">Back</a>
@if($films)
    @foreach($films as $film)
    <div>
        {{ $film->title }} |
        <a href="/update_status/{{ $film->id }}">update status</a> |
    </div>
    @endforeach
@endif
