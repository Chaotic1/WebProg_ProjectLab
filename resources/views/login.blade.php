@extends('landingGuest')
@section('content')
    <div class="justify-center align-center">
        <h2 class="fw-bold">Login</h2>
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="emailMember" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="emailMember" aria-describedby="email-help" name="email">
                <div class="form-text" id="email-help">Input your email</div>
            </div>
            <div class="mb-3">
                <label for="passMember" class="form-label">Password</label>
                <input type="password" class="form-control" id="passMember" aria-describedby="pass-help" name="password">
                <div class="form-text" id="pass-help">Minimum 8 characters</div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="Remember">
                <label for="Remember" class="form-check-label">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <div>
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    
@endsection