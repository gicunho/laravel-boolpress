@extends('layouts.admin')

@section('content')

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
            <tr>
                <td>{{$content->id}}</td>
                <td>{{$content->name}}</td>    
                <td>{{$content->description}}</td>    
                <td>{{$content->price}}</td>
                <td>View | Edit | Delete</td>    
            </tr>
                @endforeach
        </tbody>
    </table>

@endsection