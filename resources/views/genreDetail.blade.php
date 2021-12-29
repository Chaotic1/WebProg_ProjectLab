@extends('landingAdmin')
@section('content')

{{-- Bagian untuk update genre detail yang ada --}}

    <h3>{{ $genres->name }} Genre Detail</h3>

    {{-- <div>
        <form action="/updateGenre/{{ $genres->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="updateGenre">Name</label><br>
            <input id="updateGenre" type="text" name="name" value="{{ $genres->name }}"><br>

            <button type="submit">Update</button>
        </form>
    </div> --}}

    <div class="card m-4">
        <div class="card-body">
            <h5 class="card-title">Update Genre</h5>
            <form action="/updateGenre/{{ $genres->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group">
                    <span class="input-group-text" id="updateGenre">Name</span>
                    <input id="updateGenre" type="text" name="name" class="form-control" value="{{ $genres->name }}" aria-describedby="genre">
                </div> <br>
                <button type="submit" class="btn btn-primary">Update Genre</button>
            </form>
        </div>
    </div>

    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

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

    <br>

    {{-- Bagian untuk kasih tau buku apa yang memiliki genre ini --}}

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Book List</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres->book as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>
                            <a href="/detail/{{ $book->id }}"><button type="submit" class="btn btn-primary">View Details</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection