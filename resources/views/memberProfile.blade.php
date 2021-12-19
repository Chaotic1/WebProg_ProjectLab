@extends('landingMember')

@section('content')

{{-- Bagian untuk update profile member. Cuma bisa update nama member --}}

    <form action="/profileMember" method="POST">
        @method('PUT')
        @csrf
        Name        : <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"><br>
        Email       : {{ Auth::user()->email }} <br>
        Role        : {{ Auth::user()->role }} <br>

        <button type="submit">Update</button>
    </form>

@endsection