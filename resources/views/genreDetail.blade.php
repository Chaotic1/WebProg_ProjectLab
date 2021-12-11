@extends('landingAdmin')
@section('content')

<div>
    <h3>{{ $genres->name }} Genre Detail</h3>

    <div>
        <form action="/updateGenre/{{ $genres->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="updateGenre">Name</label><br>
            <input id="updateGenre" type="text" name="name" value="{{ $genres->name }}"><br>

            <button type="submit">Update</button>
        </form>
    </div>

    <br>

    <div>
        <table>
            <tr>
                <th>
                    Book List
                </th>
            </tr>
            <tr>
                <td>
                    
                    @foreach ($genres->book as $book)
                        
                   {{ $book->title }} <a href="/detail/{{ $book->id }}">View Detail</a>

                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection