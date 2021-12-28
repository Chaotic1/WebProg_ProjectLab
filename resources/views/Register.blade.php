@extends('landingGuest')
@section('content')
    <div class="justify-center align-center">
        <h2 class="fw-bold">Register</h2>
        <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="emailMember" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="emailMember" name="email" aria-describedby="email-help">
                <div class="form-text" id="email-help">Input your email</div>
            </div>
            <div class="mb-3">
                <label for="memberName" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name"  id="memberName">
            </div>
            <div class="mb-3">
                <label for="passMember" class="form-label">Password</label>
                <input type="password" class="form-control" id="passMember" name="password"  aria-describedby="pass-help">
                <div class="form-text" id="pass-help">Minimum 8 characters</div>
            </div>
            <div class="mb-3">
                <label for="CpassMember" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm"  id="CpassMember">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
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