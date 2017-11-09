<form method="POST" action='gallery/{{ $gallery->id }}'>
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button>Delete Gallery</button>
</form>