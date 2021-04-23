@extends('index')

@section('post')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts manager</h2>
                <br>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Post Title</th>
            <th scope="col">Category</th>
            <th scope="col" width="250px">Action</th>
        </tr>
        @foreach ($posts as $i => $post)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->category }}</td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

    {{$posts->links()}}
   

</div>
@endsection
@include('include.post')