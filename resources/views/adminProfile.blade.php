@extends('landingAdmin')

@section('content')

    <form action="/profileAdmin" method="POST">
        @method('PUT')
        @csrf
        Name        : <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"> <br>
        Email       : {{ Auth::user()->email }} <br>
        Role        : {{ Auth::user()->role }} <br>

        <button type="submit">Update</button>
    </form>

@endsection