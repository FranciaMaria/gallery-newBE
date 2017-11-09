<form action='gallery/{{ $gallery->id }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button>Delete Gallery</button>
</form>