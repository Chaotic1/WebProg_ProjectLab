@extends('landingAdmin')

@section('content')

{{-- Bagian untuk update profile admin. Cuma bisa update nama admin. --}}

    {{-- <form action="/profileAdmin" method="POST">
        @method('PUT')
        @csrf
        Name        : <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"> <br>
        Email       : {{ Auth::user()->email }} <br>
        Role        : {{ Auth::user()->role }} <br>

        <button type="submit">Update</button>
    </form> --}}
    
    <div class="card m-4">
        <div class="card-body">
            <h5 class="card-title">Profile</h5>
            <form action="/profileAdmin" method="POST">
                @method("PUT")
                @csrf
                Name        : <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"> <br>
                Email       : {{ Auth::user()->email }} <br>
                Role        : {{ Auth::user()->role }} <br>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <br>
            <a href="/resetAdmin"><button type="submit" class="btn btn-primary"> Change Password </button></a>
        </div>
    </div>

    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
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