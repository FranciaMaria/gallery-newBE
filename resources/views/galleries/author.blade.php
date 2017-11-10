@extends('layout.master')

@section('title')
    {{ auth()->user()->name }} Homepage
@endsection

@section('header-title')
    Galleries
@endsection

@section('header-desc')
    {{ auth()->user()->name }} 's Galleries
@endsection

@section('content')
    @foreach ($galleries as $gallery)

        <div class="blog-post">
          <h2 class="blog-post-title"><a href="{{ route('single-gallery', ['id' => $gallery->id]) }}">{{ $gallery->name }}</a></h2>
          <p>Description: {{ $gallery->description }}</p>
          <p>Created at: {{ $gallery->created_at }}</p>

          @if(auth()->user()->id === $gallery->user_id)

          <div class="form-group">
          <span style="display: inline;">
            <a class="nav-link" href="{{ route('gallery-edit', $gallery['id']) }}"><button>Edit</button></a>
          
            <form action="{{ route('gallery-delete', $gallery['id']) }}" method="post">
              <input type="hidden" name="_method" value="delete" />
                <button type="submit">Delete</button>
                {!! csrf_field() !!}
            </form>
          </span>
      		</div>
  		  @endif


          <hr>
        </div>
         

    @endforeach
@endsection
