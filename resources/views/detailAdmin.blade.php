@extends('landingAdmin')
@section('content')
    <img width="200px" height="200px" src="{{ Storage::url($books->cover) }}" alt=""><br>
    Title      : {{ $books->title }} <br>
    Author     : {{ $books->author }} <br>
    Description: {{ $books->description }} <br>
    Price      : Rp. {{ $books->price }} <br>
    Genre      :
    @foreach ($books->genre as $genre) 
         {{ $genre->name }} 
    @endforeach
@endsection