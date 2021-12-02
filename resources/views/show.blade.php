@extends('landingAdmin')
@section('content')

<div>
    <table>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>
                    <img width="200px" height="200px" src="{{ Storage::url($book->cover) }}" alt=""><br>
                    Title: {{ $book->title }}<br>
                    Desc: {{ $book->description }}<br>
                    Auhtor: {{ $book->author }}<br>
                    Price: {{ "Rp.".$book->price }}<br>
                    @foreach ($book->genre as $genre)
                    Genre: {{ $genre->name }}
                    @endforeach
                </td>
            </tr>           
        @endforeach
    </tbody>
    </table>
</div>

@endsection