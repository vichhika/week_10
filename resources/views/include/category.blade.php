@section('header')
    <header class="masthead" style="background-image: url({{asset('assets/img/home-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Category</h1>
                        <span class="subheading">Create something, remove something</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
<div class="container">
@yield('category')
</div>
@endsection
