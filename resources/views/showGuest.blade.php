@extends('landingGuest')

@section('content')

{{-- Search Bar untuk nyari buku --}}

<div class="d-flex justify-content-center p-3">
    <form action="/search" method="GET">
        <input type="search" name="keyword" placeholder="Search..." id="keyword">
        <button type="submit">Search</button>
    </form>
</div>

{{-- Bagian untuk display buku --}}

{{-- <div>
    <table>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>
                    <img width="200px" height="200px" src="{{ Storage::url($book->cover) }}" alt=""><br>
                    Title:
                    <a href="guest/detail/{{ $book->id }}">{{ $book->title }}</a><br> 
                    Author: {{ $book->author }} <br>
                    Price: {{ $book->price }} <br>
                </td>
            </tr>           
        @endforeach
    </tbody>
    </table>
</div> --}}

<div class="container-fluid">
    <div class="row gap-4 justify-content-center">
        @foreach ($books as $book)
            <div class="card" style="width: 14rem;">
                <img width="200px" height="200px" src="{{ Storage::url($book->cover) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">{{ $book->author }}</p>
                    <p class="card-text">Price: {{ $book->price }}</p>
                    <a href="guest/detail/{{ $book->id }}" class="btn btn-primary">Details</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection