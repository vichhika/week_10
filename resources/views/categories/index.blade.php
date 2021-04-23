@extends('index')

@section('category')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories manager</h2>
                <br>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
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
            <th scope="col">Category</th>
            <th scope="col" width="250px">Action</th>
        </tr>
        @foreach ($categories as $i => $category)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $category->category }}</td>
            <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>
@endsection
@include('include.category')