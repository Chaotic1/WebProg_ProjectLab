@extends('landingMember')
@section('content')

{{-- Bagian dimana member update quantity item yang ada di dalam cartnya. Cuma bisa update quantity item --}}
    
    <div>
        <form action="/update/member/detail/{{ $books->id }}" method="POST">
        @method('PUT')
        @csrf
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
        
            <label for="bookAmount">Quantity</label><br>
            <input id="bookAmount" type="number" name="quantity" min="1" value="1"><br>
            <br>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection