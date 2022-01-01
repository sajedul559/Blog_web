@extends('user.layouts.master')
@section('main_content')
<div class="container-fluid mt-5">
        <div class="card col-md-6 offset-md-3"style="color: black">
            <h1 class="card-header text-center">Edit Post</h1>
            <div class="card-body" >
                <form action="{{route('update.post',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Post Title:</label>
                      <input type="text" class="form-control" name="title" aria-describedby="emailHelp" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description:</label>
                      <textarea  name="description" id="summary" cols="30" rows="10">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Old Photoz:</label><br>
                      <img src="{{asset('images/posts/'.$post->photo)}}" alt="nai" height="60" width="60" > <br>
                        <label for="exampleInputPassword1">New Photo:</label>
                        <input type="file" name="photo" class="form-control" >
                      </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

   
</div>
@endsection



<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
function test()
{
  alert('tesing');
}
  $(document).ready(function() {
    $('#summary').summernote();
  });
  </script>
    

