<form method="post" action="create_genre">
    {{ csrf_field() }}
    <input type="text" name="title">
    <input type="submit" value="Send">
</form>
