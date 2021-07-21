@extends('layouts.app')

@section('content')
    @foreach ($contents as $content)
        <h1>{{$content->name}}</h1>
    @endforeach

@endsection