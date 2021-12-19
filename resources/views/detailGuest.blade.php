@extends('landingGuest')
@section('content')
    {{-- Bagian ini untuk liat detail buku bagi guest. Guest tidak bisa apa", hanya liat doang --}}
    <div>
        <img width="200px" height="200px" src="{{ Storage::url($books->cover) }}" alt=""><br>
        Title      : {{ $books->title }} <br>
        Author     : {{ $books->author }} <br>
        Description: {{ $books->description }} <br>
        Price      : Rp. {{ $books->price }} <br>
        Genre      :
        @foreach ($books->genre as $genre) 
            {{ $genre->name }} 
        @endforeach
        <br>
    </div>
@endsection