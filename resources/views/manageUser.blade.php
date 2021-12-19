@extends('landingAdmin')

@section('content')

    @foreach ($users as $user)

        Name        : {{ $user->name }} <br>
        Email       : {{ $user->email }} <br>
        Role        : {{ $user->role }} <br>

        <a href="/manageUser/detail/{{ $user->id }}"><button type="submit">View Details</button></a><br>

        @if ($user->role == 'member')
            <form action="" method="POST">
                @method('DELETE')
                @csrf

                <button type="submit">Delete</button>

            </form>
        @endif

        <br>
        
    @endforeach

@endsection