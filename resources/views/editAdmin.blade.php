@extends('landingAdmin')
@section('content')

{{-- Bagian untuk update book --}}
<div>
    <h3>Update Book</h3>
    <form action="/update/{{ $books->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="titleInsert">Title</label><br>
        <input id="titleInsert" type="text" name="title" value="{{ $books->title }}"><br>
        <label for="descriptionInsert">Description</label><br>
        <input id="descriptionInsert" type="text" name="description" value="{{ $books->description }}"><br>
        <label for="authorInsert">Author</label><br>
        <input id="authorInsert" type="text" name="author" value="{{ $books->author }}"><br>
        <label for="bookCoverInsert">Cover</label><br>
        <input id="bookCoverInsert" type="file" name="image"><br>

        <br>

        <label>Genre</label><br>

        @foreach ($genres as $genre)
            <label for="genreInsert">{{ $genre->name }}</label>
            <input id="genreInsert" type="checkbox" name="genre[]" value="{{ $genre->id }}">
        @endforeach

        <br>

        <label for="priceInsert">Price</label><br>
        <input id="priceInsert" type="number" name="price" min="1" value="{{ $books->price }}"><br>
        <br>
        <button type="submit">Update</button>
    </form>
</div>

@endsection