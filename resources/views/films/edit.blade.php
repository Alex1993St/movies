@if($genres && $film)
    <form method="post" action="{{ route('film_update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $film->id }}">
        <input type="hidden" name="old_image" value="{{ $film->image }}">
        <label>Title:</label>
        <input type="text" name="title" value="{{ $film->title }}" required>
        <label>Genre:</label>
        <select name="genre_id[]"  multiple required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $film->isSelected($genre->id) }}>{{ $genre->title }}</option>
            @endforeach
        </select>
        <label>Is active:</label>
        <input type="checkbox" {{ $film->status ? 'checked' : '' }} name="status">
        <label>Banner:</label>
        <input type="file" name="image">
        <input type="submit" value="Send">
    </form>
    @include('errors.film')
@endif
