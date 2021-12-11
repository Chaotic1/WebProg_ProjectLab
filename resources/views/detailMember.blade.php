@extends('landingMember')
@section('content')
    
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
    <div>
        <form action="" method="">
            <label for="priceInsert">Quantity</label><br>
            <input id="priceInsert" type="number" name="quantity" min="1"><br>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
    {{-- <div>
        <a href="/edit/{{ $books->id }}">Edit &rarr;</a>
    </div>
    <div>
        <form action="/detail/{{ $books->id }}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" name="delete" value="Delete">
        </form>
    </div> --}}
    
@endsection