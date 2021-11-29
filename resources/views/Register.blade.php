@extends('landingGuest')
@section('content')
    <div class="justify-center align-center">
        <h2 class="fw-bold">Register</h2>
        <form>
            <div class="mb-3">
                <label for="emailMember" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="emailMember" aria-describedby="email-help">
                <div class="form-text" id="email-help">Input your email</div>
            </div>
            <div class="mb-3">
                <label for="memberName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="memberName">
            </div>
            <div class="mb-3">
                <label for="passMember" class="form-label">Password</label>
                <input type="password" class="form-control" id="passMember" aria-describedby="pass-help">
                <div class="form-text" id="pass-help">Minimum 8 characters</div>
            </div>
            <div class="mb-3">
                <label for="CpassMember" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="CpassMember">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    
@endsection