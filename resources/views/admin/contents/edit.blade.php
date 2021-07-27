@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create a new post</h1>

        <form action="{{route('admin.contents.update', $content->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="name">name</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelperr" placeholder="Add a name" value="{{$content->name}}">
        <small id="titleHelperr" class="form-text text-muted">Type a title for the post, max 255 characters</small>
        </div>  

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="nameHelperr" placeholder="Add a description" value="{{$content->description}}">
            <small id="descriptionHelperr" class="form-text text-muted">Type a description for the post</small>
        </div>  

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    

@endsection