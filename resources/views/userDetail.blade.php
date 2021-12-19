@extends('landingAdmin')

@section('content')

{{-- Bagian untuk display detail user. Bisa update role, name, email --}}

    <form action="/manageUser/detail/{{ $users->id }}" method="POST">
        @method('PUT')
        @csrf
        <label for="userName">Name</label><br>
        <input id="userName" type="text" name="name" value="{{ $users->name }}"><br>
        <label for="userEmail">Email</label><br>
        <input id="userEmail" type="text" name="email" value="{{ $users->email }}"><br>
        <label for="userRole">Role</label><br>
        <input id="userRole" type="text" name="role" value="{{ $users->role }}"><br>

        <button type="submmit">Update</button>
    </form>

@endsection