@extends('landingGuest')

@section('content')

<div class="d-flex justify-content-center p-3 gap-2">
    <form action="/search" method="GET" class="row">
        <input type="search" name="keyword" placeholder="Search..." id="keyword" class="col gx-5">
        <button type="submit" class="btn btn-primary btn-sm col-auto">Search</button>
    </form>
    <br>
    <a href="/"><button type="submit" class="btn btn-primary btn-sm col-auto">Clear Filter</button></a>
</div>

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
<br>
<div class="d-flex justify-content-center">
    {{$books->links('pagination::bootstrap-4')}}
</div>

@endsection