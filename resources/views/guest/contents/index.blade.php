@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($contents as $content)
        <h1>{{$content->name}}</h1>
        <h4>Category: <a href="">{{$content->category ? $content->category->name : 'No category'}}</a></h4>
        <h5>Tags:
            @forelse ($content->tags as $tag)
                <span>{{$tag->name}}</span>
            @empty
                <span>NO TAGS</span>
            @endforelse
        </h5>
        <img width="100" src="{{('storage/' . $content->image)}}" alt="">
    @endforeach
    </div>


@endsection