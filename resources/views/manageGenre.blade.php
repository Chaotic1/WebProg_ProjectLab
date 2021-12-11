@extends('landingAdmin')
@section('content')

<div>
    <h3>Insert Genre</h3>
    <form action="/insertGenre" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="titleInsert">Name</label><br>
        <input id="titleInsert" type="text" name="name" placeholder="Name"><br>

        <br>

        {{-- <label>Genre</label><br>

        @foreach ($genres as $genre)
            <label for="genreInsert">{{ $genre->name }}</label>
            <input id="genreInsert" type="checkbox" name="genre[]" value="{{ $genre->id }}">
        @endforeach

        <br> --}}

        <button type="submit">Add Genre</button>
    </form>

    <div>
        <table>
            <tr>
                <th>
                    Genre Name
                </th>
            </tr>
            <tr>
                <td>
                    @foreach ($genres as $genre)
                        
                    <a href="manageGenre/detail/{{ $genre->id }}">{{ $genre->name }}</a>
                         
                    <form action="">
                        Delete &rarr; 
                    </form>
                    <br>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection