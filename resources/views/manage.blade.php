@extends('landingAdmin')
@section('content')

{{-- Bagian untuk insert buku baru ke database --}}

<div>
    <h3>Insert Book</h3>
    <form action="/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="titleInsert">Title</label><br>
        <input id="titleInsert" type="text" name="title" placeholder="Title"><br>
        <label for="descriptionInsert">Description</label><br>
        <input id="descriptionInsert" type="text" name="description" placeholder="Description"><br>
        <label for="authorInsert">Author</label><br>
        <input id="authorInsert" type="textarea" name="author" placeholder="Author"><br>
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
        <button type="submit">Submit</button>
    </form>
</div>

{{-- Bagian untuk kasi liat semua buku yang ada di database --}}

<div>
    <table>
        <tr>
            <th>
                Book List
            </th>
        </tr>
        <tr>
            <td>
                @foreach ($books as $book)
                    Name       : {{ $book->title }} <br>
                    Author     : {{ $book->author }} <br>
                    Description: {{ $book->description }} <br>
                    Genre      :
                        @foreach ($book->genre as $genre) 
                            {{ $genre->name }}
                        @endforeach
                        <br>
                    Price      : {{ $book->price }} <br>

                    <a href="/detail/{{ $book->id }}"><button type="submit">View Details</button></a>
                    <br>
                    <form action="/detail/{{ $book->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="delete" value="Delete">
                    </form>
                @endforeach
            </td>
        </tr>
    </table>
</div>

@endsection