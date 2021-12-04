@extends('landingAdmin')
@section('content')

<div>
    <h3>Update Book</h3>
    <form action="/update/{{ $books->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="titleInsert">Title</label><br>
        <input id="titleInsert" type="text" name="title" placeholder="Title"><br>
        <label for="descriptionInsert">Description</label><br>
        <input id="descriptionInsert" type="text" name="description" placeholder="Description"><br>
        <label for="authorInsert">Author</label><br>
        <input id="authorInsert" type="text" name="author" placeholder="Author"><br>
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
        <input id="priceInsert" type="number" name="price" min="1"><br>
        <br>
        <button type="submit">Update</button>
    </form>
</div>

@endsection