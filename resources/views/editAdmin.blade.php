@extends('landingAdmin')
@section('content')

{{-- Bagian untuk update book --}}
{{-- <div>
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

    @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">
                        {{ $error }}
                    </li>
                @endforeach
            </div>
    @endif

</div> --}}

<div class="card m-4">
    <div class="card-body">
        <h5 class="card-title">Update Book</h5>
        <form action="/update/{{ $books->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="input-group">
                <span class="input-group-text" id="title">Title</span>
                <input type="text" class="form-control" value="{{ $books->title }}" placeholder="Title" name="title" aria-describedby="title">
            </div> <br>
            <div class="input-group">
                <span class="input-group-text" id="author">Author</span>
                <input type="text" class="form-control" value="{{ $books->author }}" placeholder="Author" name="author" aria-describedby="author">
            </div> <br>
            <div class="input-group">
                <span class="input-group-text">Description</span>
                <textarea class="form-control" name="description">{{  $books->description  }}</textarea>
            </div> <br>
            <p class="card-text">Cover</p>
            <div class="input-group">
                <input id="coverInsert" type="file" name="image">
            </div>
            <br>
            <div class="container">
                <p class="card-text">Genre</p>
                <div class="row">
                    @foreach ($genres as $genre)
                        <div class="col-2">
                            <label for="genreInsert">{{ $genre->name }}</label>
                            <input id="genreInsert" type="checkbox" name="genre[]" value="{{ $genre->id }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text" id="price">Price</span>
                <input id="price" type="number" name="price" min="1" value="{{ $books->price }}">
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>

        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">
                        {{ $error }}
                    </li>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection