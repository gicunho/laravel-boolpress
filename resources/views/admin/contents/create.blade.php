@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create a new post</h1>


        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

        <form action="{{route('admin.contents.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelperr" placeholder="Add a name" value="{{old('name')}}">
        <small id="titleHelperr" class="form-text text-muted">Type a title for the post, max 255 characters</small>
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" name="image" id="image">
            <small id="titleHelperr" class="form-text text-muted">Select an image</small>
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror 


        <div class="form-group">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control" name="description" id="description" aria-describedby="nameHelperr" placeholder="Add a name" value="{{old('description')}}">
            <small id="descriptionHelperr" class="form-text text-muted">Type a description for the post</small>
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror  

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    

@endsection