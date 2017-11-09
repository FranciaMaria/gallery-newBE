@extends('layout.master')

@section('title')
    
@endsection

@section('header-title')
    
@endsection

@section('header-desc')
    Page for: {{ $gallery->name }}
@endsection

@section('content')


 

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

    @if(auth()->user()->id === $gallery->user_id)

        <form method="POST" action="{{ route('gallery-photos', ['gallery_id' => $gallery->id]) }}">

              {{ csrf_field() }}

        <div class="form-group">


            <label for="url">Image url</label>


            <input class="form-control" id="url" name="url">
            @include('partials.error-message', ['fieldTitle' => 'url'])
          
            
        </div>

         <div class="form-group">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>


        </form>

      @endif
    

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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script type="text/javascript">


    $(document).ready(function() {


      $(".add-more").click(function(){ 

          var html = $(".copy").html();

          $(".after-add-more").after(html);

      });


      $("body").on("click",".remove",function(){ 

          $(this).parents(".control-group").remove();

      });


    });


</script>
