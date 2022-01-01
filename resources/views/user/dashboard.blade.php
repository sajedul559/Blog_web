@extends('user.layouts.master')

@section('main_content')
<div class="container-fluid mt-5">
    <div class="col-md-4 offset-md-4">
        @include('user.layouts.notification')

    </div>


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ">Dashboard</h1>
        <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ">Go To Home</a>
                <a href="{{route('create.post')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-4"><i
                  class="fas fa-plus fa-sm text-white-50"></i> Create Post</a>
    </div>

    <!-- Content Row -->
    <div class="row col-md-12 ">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Title</th>
                <th scope="col">Photo</th>
                <th class="text-center" scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
            @forelse ($posts as  $post)
            <tr>
                <td  >{{$loop->iteration}}</th>
                <td>{{$post->title}}</td>
                <td>
                  <img src="{{asset('images/posts/'.$post->photo)}}" alt="" height="60" width="60" style="border-radius: 50%">
                </td>
                <td class="text-center">
                    <a href="{{route('edit.post',$post->id)}}"  class="btn btn-primary btn-sm mr-1 edit"><span class="fa fa-edit"></span></a>
                                      
                    <a href="{{route('delete.post',$post->id)}}"  class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                </td>
              </tr>
            @empty
                {{ $message}}
            @endforelse
              
            </tbody>
          </table>
          
      
    </div>

   

</div>
@endsection