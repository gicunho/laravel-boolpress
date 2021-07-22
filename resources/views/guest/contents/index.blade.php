@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($contents as $content)
        <h1>{{$content->name}}</h1>
    @endforeach
    </div>


@endsection