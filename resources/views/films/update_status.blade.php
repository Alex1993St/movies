@if( $film)
    <form method="post" action="{{ route('update_status') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $film->id }}">
        <label>Title:</label>
        <input type="text" name="title" value="{{ $film->title }}" readonly>
        <label>Is active:</label>
        <input type="checkbox" {{ $film->status ? 'checked' : '' }} name="status">
        <input type="submit" value="Send">
    </form>
@endif
