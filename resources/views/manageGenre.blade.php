@extends('landingAdmin')
@section('content')

{{-- Bagian untuk insert genre baru ke database --}}

<div>
    <h3>Insert Genre</h3>
    <form action="/insertGenre" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="titleInsert">Name</label><br>
        <input id="titleInsert" type="text" name="name" placeholder="Name"><br>

        <br>

        <button type="submit">Add Genre</button>
    </form>
    {{-- Bagian untuk display semua genre yang ada di database --}}
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
                        
                    <a href="manageGenre/detail/{{ $genre->id }}">{{ $genre->name }}</a> {{-- Takes you to the genre detail page --}}

                    
                         {{-- Bagian untuk delete genre dari database  --}}
                    <form action="/manageGenre/delete/{{ $genre->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button> 
                    </form>
                    <br>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection