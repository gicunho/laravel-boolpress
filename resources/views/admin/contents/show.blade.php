@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1>{{$content->name}}</h1>
        <p>{{$content->description}}</p>
        <img src="{{asset('storage/' . $content->image)}}" alt="">
    </div>

@endsection