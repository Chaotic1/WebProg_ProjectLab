@extends('landingAdmin')
@section('content')
    
{{-- Bagian untuk liat book detail --}}
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
    </div>
{{-- Bagian untuk ke update page --}}
    <div>
        <a href="/edit/{{ $books->id }}">Edit &rarr;</a>
    </div>
    {{-- <div>
        <form action="/detail/{{ $books->id }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" name="delete" value="Delete">
        </form>
    </div> --}}
    
@endsection