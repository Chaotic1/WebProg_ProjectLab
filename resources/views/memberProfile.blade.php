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