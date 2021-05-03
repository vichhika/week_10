@extends('index')

@section('post')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts manager</h2>
                <br>
            </div>
            @can('createPost',\App\Model\Post::class)
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
            @endcan
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
            <th scope="col">Author</th>
            <th scope="col" width="250px">Action</th>
        </tr>
        @foreach ($posts as $i => $post)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->category }}</td>
            <td>{{ $post->user->name}} </td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    @can('updatePost',$post)
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('deletePost',$post)
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach

    </table>

    {{$posts->links()}}


</div>
@endsection
@include('include.post')
