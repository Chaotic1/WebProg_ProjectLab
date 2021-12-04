@extends('landingAdmin')
@section('content')

<div>
    <table>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>
                    <img width="200px" height="200px" src="{{ Storage::url($book->cover) }}" alt=""><br>
                    Title:
                    <a href="detail/{{ $book->id }}">{{ $book->title }}</a><br> 
                </td>
            </tr>           
        @endforeach
    </tbody>
    </table>
</div>

@endsection