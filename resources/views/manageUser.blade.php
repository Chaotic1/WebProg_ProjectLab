@extends('landingAdmin')

@section('content')

{{-- Bagian untuk display all user yang ada di dalam database. Jika user admin, maka admin ga bisa di delete. Harus delete manual untuk admin --}}

    {{-- @foreach ($users as $user)

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
        
    @endforeach --}}

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="row">
                        <a href="/manageUser/detail/{{ $user->id }}" class="col-auto"><button type="submit" class="btn btn-secondary ">View Details</button></a>
                        @if ($user->role == 'member')
                            <form action="/manageUser/detail/{{ $user->id }}" method="POST" class="col">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

@endsection