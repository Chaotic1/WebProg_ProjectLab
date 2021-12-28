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

        <button type="submit">Update</button>
    </form>


    <div>
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <div>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">
                        {{ $error }}
                    </li>
                @endforeach
            </div>
        @endif
    </div>

@endsection