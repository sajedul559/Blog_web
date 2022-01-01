@extends('user.layouts.master')
@section('main_content')
<div class="container-fluid mt-5">
        <div class="card col-md-6 offset-md-3"style="color: black">
            <h1 class="card-header text-center">Create Post</h1>
            <div class="card-body" >
                <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Post Title</label>
                      <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Post Title">
                      @error('title')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea  name="description" id="summary" cols="30" rows="10"></textarea>
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Photo</label>
                        <input type="file" name="photo" class="form-control" >                      
                      </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
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
    

