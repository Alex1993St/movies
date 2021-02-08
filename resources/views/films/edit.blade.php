@if($genres && $film)
    <form method="post" action="{{ route('film_update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $film->id }}">
        <input type="hidden" name="old_image" value="{{ $film->image }}">
        <input type="text" name="title" value="{{ $film->title }}">
        <select name="genre_id[]"  multiple>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $film->isSelected($genre->id) }}>{{ $genre->title }}</option>
            @endforeach
        </select>
        <input type="checkbox" {{ $film->status ? 'checked' : '' }} name="status">
        <input type="file" name="image">
        <input type="submit" value="Send">
    </form>
@endif
