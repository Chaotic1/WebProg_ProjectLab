@extends('landingAdmin')
@section('content')

<div class="container justify-content-center">
    <div class="card m-4">
        <div class="card-body">
            <h5 class="card-title">Insert Book</h5>
            <form action="/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <span class="input-group-text" id="title">Title</span>
                    <input type="text" class="form-control" placeholder="Title" name="title" aria-describedby="title">
                </div> <br>
                <div class="input-group">
                    <span class="input-group-text" id="author">Author</span>
                    <input type="text" class="form-control" placeholder="Author" name="author" aria-describedby="author">
                </div> <br>
                <div class="input-group">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" name="description"></textarea>
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
                    <input id="price" type="number" name="price" min="1">
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
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

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>

    <br>

    <h5>Book List</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Description</th>
                <th scope="col">Genre</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description }}</td>
                    <td>
                        @foreach ($book->genre as $genre)
                            {{ $genre->name }}
                        @endforeach
                    </td>
                    <td>{{ $book->price }}</td>
                    <td>
                        <a href="/detail/{{ $book->id }}"><button type="submit" class="btn btn-secondary">View Details</button></a>
                        <form action="/detail/{{ $book->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection