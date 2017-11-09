@extends('layout.master')

@section('title')
    
@endsection

@section('header-title')
   
@endsection

@section('header-desc')
    
@endsection

@section('content')

    <div class="blog-post">
    @if( auth()->user()->id === $gallery->user_id )
      <button href="{{ route('gallery-edit', $id) }}">Edit</button>
      <button href="{{ route('gallery-delete', $id) }}">Delete</button>
    @endif
      <p class="blog-post-meta"><strong>Open photo: </strong><img src="{{ $photo->url }}">{{ $photo->url }}></p>
      <p class="blog-post-meta"><strong>Gallery:</strong> <a href="{{ route('single-gallery', ['id' => $photo->gallery->id]) }}">{{ $photo->gallery->name }}</a></p>
    </div>


@endsection
