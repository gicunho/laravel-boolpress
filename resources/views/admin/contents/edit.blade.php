@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create a new post</h1>

        <form action="{{route('admin.contents.update', $content->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="name">name</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelperr" placeholder="Add a name" value="{{$content->name}}">
        <small id="titleHelperr" class="form-text text-muted">Type a title for the post, max 255 characters</small>
        </div>
        
        <div class="form-group">
            <img src="{{asset('storage/' . $content->image)}}" alt="">
            <input type="file" name="image" id="image">
            <small id="titleHelperr" class="form-text text-muted">Select an image</small>
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror 

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="nameHelperr" placeholder="Add a description" value="{{$content->description}}">
            <small id="descriptionHelperr" class="form-text text-muted">Type a description for the post</small>
        </div>  

        <div class="form-group">
            <label for="category_id">Categories</label>
            <select class="form-control" name="category_id" id="category_id">
              <option value="">Select a category</option>

              @foreach ($categories as $category)
              <option value="{{$category->id}}" {{$category->id == old('category_id', $content->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
              @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" name="tags[]" id="tags">
              <option value="" selected >Select a tag</option>
              @forelse ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
                  
              @empty
                  
              @endforelse
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    

@endsection