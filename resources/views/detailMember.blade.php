@extends('landingMember')
@section('content')
    {{-- Bagian ini untuk liat detail buku bagi member. Member hanya bisa masukan buku ke cart. --}}
    <div>
        <form action="/member/detail/{{ $books->id }}" method="POST" enctype="multipart/form-data">
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
        {{-- Bagian ini member bisa masukan buku ke cart, dengan jumlah yang diinginkan --}}
            <label for="bookAmount">Quantity</label><br>
            <input id="bookAmount" type="number" name="quantity" min="1" value="1"><br>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection