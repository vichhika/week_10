@extends('index')

@section('category')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong><br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Name:</strong>
                <input type="text" name="category" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </div>
</form>
@endsection
@include('include.category')