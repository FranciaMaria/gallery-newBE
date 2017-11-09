@extends('layout.master')

@section('title')
    
@endsection

@section('header-title')
    
@endsection

@section('header-desc')
    Page for: {{ $gallery->name }}
@endsection

@section('content')

  @if(auth()->user()->id === $gallery->user_id)

      <div class="form-group">
          <button class="btn btn-primary" href="{{ route('gallery-edit', $gallery->id) }}">Edit</button>
          <button class="btn btn-primary" href="{{ route('gallery-delete', $gallery->id) }}">Delete</button>
      </div>
  @endif

    <div class="blog-post">
      <h2 class="blog-post-title">{{ $gallery->name }}</h2>
      <p class="blog-post-meta"><strong>Description: </strong>{{ $gallery->description }}</p>
      <p class="blog-post-meta"><strong>Created by:</strong> {{$gallery->user->name}}</p>
      <p class="blog-post-meta"><strong>Created at:</strong> {{$gallery->created_at}}</p>
      <p class="blog-post-meta"><strong>{{ $gallery->name }} photos:</strong></p>
      <ul class="list-unstyled">
          @foreach ($gallery->photos as $photo)
              <li>
                 <img src="{{ $photo->url }}">
              </li>
          @endforeach
      </ul>
    </div>
    <hr>
    <ul class="unstyled">
        @foreach ($gallery->comments as $comment)
            <li>
                <p>
                    {{ $comment->content }} by {{ $comment->user->name }}
                </p>
            </li>
        @endforeach
    </ul>
    <hr>

    @if(auth()->user()->id != $gallery->user_id)

    <h2>Leave a comment</h2>

    <form method="POST" action="{{ route('gallery-comments', ['gallery_id' => $gallery->id]) }}">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="content">Comment content:</label><br>
            <textarea class="form-control" id="content" name="content"></textarea>

            @include('partials.error-message', ['fieldTitle' => 'content'])
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

    @endif


@endsection
