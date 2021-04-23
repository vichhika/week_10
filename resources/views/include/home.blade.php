@extends('index')

@section('header')
    <header class="masthead" style="background-image: url({{asset('assets/img/home-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($posts as $post)
        <div class="post-preview">
          <a href="{{route('view',$post->id)}}">
            <h2 class="post-title">
              {{$post->title}}
            </h2>
            <h3 class="post-subtitle">
              {{ substr($post->description,0, 50) }}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="{{url('/')}}">{{$post->user->name}}</a>
            {{$post->updated_at}}</p>
        </div>
        <hr>
      @endforeach
      </div>
    </div>
    {{$posts->links()}}
</div>
@endsection
