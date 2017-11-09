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
          <hr>
        </div>

    @endforeach
@endsection
