@extends('layout.master')

@section('title')
    Create new Album
@endsection



@section('content')

<h2>Create new Album</h2>

    <form method="post" action="{{ route('update-gallery', $gallery['id']) }}">

        {{ csrf_field() }}

        <div class="form-group">

            <label for="name">Name</label>

            <input type="text" class="form-control" id="name" name="name" value="{{ $gallery->name }}" />
            @include('partials.error-message', ['fieldTitle' => 'name'])
            
            
        </div>

        <div class="form-group">

            <label for="description">Description</label>

            <textarea class="form-control" id="description" name="description" value="{{ $gallery->description }}"></textarea>
            @include('partials.error-message', ['fieldTitle' => 'description'])
            
            
        </div>


        <div class="form-group">

            <label for="url">Image url</label>

                @foreach($gallery->photos as $photo)
                  <input class="form-control" id="url" name="url" value="{{ $photo->url }}">
                  @include('partials.error-message', ['fieldTitle' => 'url'])
                @endforeach
                <div class="form-group">

                 

                </div>
              
        </div>


<!-- 
        <div class="input-group control-group after-add-more">

          <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">

          <div class="input-group-btn"> 

            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>

          </div>

        </div>


        <div class="copy hide">

          <div class="control-group input-group" style="margin-top:10px">

            <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">

            <div class="input-group-btn"> 

              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>

            </div>

          </div>

        </div>
 -->
   <!--    </form> -->
    
     
        <div class="form-group">

            <button type="submit" class="btn btn-primary">Update</button>

        </div>

    </form>


@endsection

<!-- 
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


</script> -->


