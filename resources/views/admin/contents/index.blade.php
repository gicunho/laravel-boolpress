@extends('layouts.admin')

@section('content')
    <div class="container">
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
                    <td>View | Edit | Delete
                        <a href="{{route('admin.contents.show', $content->id)}}">
                            <i class="fas fa-eye fa-sm fa-fw"></i> View 
                        </a>
                    </td>    
                </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    

@endsection