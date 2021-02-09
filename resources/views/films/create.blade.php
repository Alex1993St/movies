<form method="post" action="create_film" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label>Title:</label>
    <input type="text" name="title" required>
    <label>Genre:</label>
    <select name="genre_id[]"  multiple required>
    @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->title }}</option>
    @endforeach
    </select>
    <label>Banner:</label>
    <input type="file" name="image">
    <input type="submit" value="Send">
</form>
@include('errors.film')
