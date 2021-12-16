@extends('landingMember')

@section('content')

{{ Auth::user()->role }}

<div>
    <table>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>
                    <img width="200px" height="200px" src="{{ Storage::url($book->cover) }}" alt=""><br>
                    Title:
                    <a href="member/detail/{{ $book->id }}">{{ $book->title }}</a><br> 
                </td>
            </tr>           
        @endforeach
    </tbody>
    </table>
</div>

<div>
    {{-- @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif --}}
</div>

@endsection