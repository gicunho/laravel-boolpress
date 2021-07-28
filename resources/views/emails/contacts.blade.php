@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Hello! You have a new message from {{$data['full_name']}}!</h1>
        <p>Messaggio da: {{$data['email']}}</p>
        <p>Messaggio {{$data['message']}}p>  
    </div>
  
@endsection