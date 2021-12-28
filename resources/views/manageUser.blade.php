@extends('landingAdmin')

@section('content')

{{-- Bagian untuk display all user yang ada di dalam database. Jika user admin, maka admin ga bisa di delete. Harus delete manual untuk admin --}}

    @foreach ($users as $user)

        Name        : {{ $user->name }} <br>
        Email       : {{ $user->email }} <br>
        Role        : {{ $user->role }} <br>

        <a href="/manageUser/detail/{{ $user->id }}"><button type="submit">View Details</button></a><br>

        @if ($user->role == 'member')
            <form action="/manageUser/detail/{{ $user->id }}" method="POST">
                @method('DELETE')
                @csrf

                <button type="submit">Delete</button>

            </form>
        @endif

        <br>
        
    @endforeach

    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

@endsection