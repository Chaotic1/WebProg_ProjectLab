@extends('landingMember')
@section('content')

    <div class="container-fluid ">
        <div class="row justify-content-center p-5">
            <div class="col-4">
                <h3>{{ $books->title }} Book Detail</h3>
                <img width="300px" height="400px" src="{{ Storage::url($books->cover) }}" alt="">
            </div>
            <div class="col-6">
                <form action="/update/member/detail/{{ $books->id }}" method="POST">
                    @method('PUT')
                    @csrf
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
                    <input id="bookAmount" type="number" name="quantity" min="1" value="1">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection