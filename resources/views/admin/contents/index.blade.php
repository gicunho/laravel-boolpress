@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table table-striped table-inverse ">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
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
                    <td>
                        {{-- {{ddd($content->image)}} --}}
                        <img width="70" src="{{asset('storage/' . $content->image)}}" alt="">
                    </td>
                    <td>{{$content->name}}</td>    
                    <td>{{$content->description}}</td>    
                    <td>{{$content->price}}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{route('admin.contents.show', $content->id)}}" class="btn btn-primary">
                            <i class="fas fa-eye fa-sm fa-fw"></i> View 
                        </a>
                        <a href="{{route('admin.contents.edit', $content->id)}}" class="btn btn-secondary">
                            <i class="fas fa-edit"></i> Edit 
                        </a>
                    </a>
                    <form action="{{ route('admin.contents.destroy', $content->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-sm fa-fw"></i></button>
                    </form>
                    </td>    
                </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    

@endsection