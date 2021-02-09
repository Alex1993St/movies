<form method="post" action="create_genre">
    {{ csrf_field() }}
    <label>Title:</label>
    <input type="text" name="title" required>
    <input type="submit" value="Send">
</form>
@include('errors.genre')
