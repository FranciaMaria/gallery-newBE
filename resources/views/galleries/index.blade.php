@extends('layout.master')

@section('title')
    Galleries Homepage
@endsection

@section('header-title')
    Galleries
@endsection

@section('header-desc')
    List of all Galleries
@endsection

@section('content')
    @foreach ($galleries as $gallery)

        <div class="blog-post">
          <h2 class="blog-post-title"><a href="{{ route('single-gallery', ['id' => $gallery->id]) }}">{{ $gallery->name }}</a></h2>

          @if(auth()->user()->id === $gallery->user_id)

      		<div class="form-group">
          		<a href="{{ route('gallery-edit', $gallery['id']) }}">Edit</a>
          		<a href="{{ route('gallery-delete', $gallery['id']) }}">Delete</a>
      		</div>
  		  @endif
          <hr>
        </div>

         

    @endforeach
@endsection
