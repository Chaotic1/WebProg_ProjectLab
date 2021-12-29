@extends('landingAdmin')
@section('content')
    
{{-- Bagian untuk liat book detail --}}
    {{-- <div>
        <img width="200px" height="200px" src="{{ Storage::url($books->cover) }}" alt=""><br>
        Title      : {{ $books->title }} <br>
        Author     : {{ $books->author }} <br>
        Description: {{ $books->description }} <br>
        Price      : Rp. {{ $books->price }} <br>
        Genre      :
        @foreach ($books->genre as $genre) 
            {{ $genre->name }} 
        @endforeach
    </div> --}}
{{-- Bagian untuk ke update page --}}
    {{-- <div>
        <a href="/edit/{{ $books->id }}">Edit &rarr;</a>
    </div> --}}
    {{-- <div>
        <form action="/detail/{{ $books->id }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" name="delete" value="Delete">
        </form>
    </div> --}}


    <div class="container-fluid ">
        <div class="row justify-content-center p-5">
            <div class="col-4">
                <h3>{{ $books->title }} Book Detail</h3>
                <img width="300px" height="400px" src="{{ Storage::url($books->cover) }}" alt="">
            </div>
            <div class="col-6">
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
                <a href="/edit/{{ $books->id }}"><button type="submit" class="btn btn-primary">Edit Book Detail</button></a>
            </div>
        </div>
    </div>

    @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
    @endif
    
@endsection