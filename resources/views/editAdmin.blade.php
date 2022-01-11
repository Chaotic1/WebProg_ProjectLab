@extends('landingAdmin')
@section('content')

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
            <p class="card-text">Cover:</p>
            <div class="input-group">
                <input id="coverInsert" type="file" name="image">
            </div>
            <br>
            <div class="container">
                Genre:
                <div class="row">
                    @foreach ($genres as $genre)
                        <div class="col-2">
                            <label for="genreInsert">{{ $genre->name }}</label>
                            <input id="genreInsert" type="checkbox" name="genre[]" value="{{ $genre->id }}"

                                @foreach ($books->genre as $book_genre)
                                    {{ old('genre', $book_genre->name) === $genre->name ? 'checked' : '' }}
                                @endforeach
                            
                            >
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