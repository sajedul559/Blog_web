@extends('layouts.master')

@section('main_content')
<div class="latest-news pt-150 pb-150">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">All</span> Blogs</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>

        <div class="row">
        
            @forelse ($posts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a  href="{{route('single.post',$post->id)}}"><div class="latest-news-bg news-bg-1 mb-5 "><img src="{{asset('images/posts/'.$post->photo)}}" alt="" height="250" width="360" style="margin-bottom: 100px;"></div></a>
                    <div class="news-text-box">
                        <h3><a  href="{{route('single.post',$post->id)}}">{{$post->title}}</a></h3>
                        <p class="blog-meta">
                         
                            <span class="author"><i class="fas fa-user">{{$post->user->name}}</i></span>
                  
                            <span class="date"><i class="fas fa-calendar"></i> {{$post->created_at->diffForHumans()}}</span>
                        </p>
                        <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
                        <a  href="{{route('single.post',$post->id)}}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @empty
           
            @endforelse
           
          
        </div>
        {{-- <div class="row">
            <div class="col-lg-12 text-center">
                <a href="news.html" class="boxed-btn">More News</a>
            </div>
        </div> --}}
    </div>
</div>
@endsection