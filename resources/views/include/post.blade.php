@extends('index')

@section('header')
    <header class="masthead" style="background-image: url({{asset('assets/img/home-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Post Me</h1>
                        <span class="subheading">Create, Read, Update, Delete</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
