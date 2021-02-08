<form method="post" action="create_film" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="text" name="title">
    <select name="genre_id[]"  multiple>
    @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->title }}</option>
    @endforeach
    </select>
    <input type="file" name="image">
    <input type="submit" value="Send">
</form>
