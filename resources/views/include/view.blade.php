@extends('index')

@section('header')
    <header class="masthead" style="background-image: url({{asset('assets/img/post-sample-image.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>{{$post->title}}</h1>
                        <span class="subheading">Post by {{$post->user->name}} at {{$post->updated_at}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
<div class="container">
    <h3>{{$post->category->category}}</h3>
    <hr>
    <p>{{$post->description}}</p>
</div>
@endsection