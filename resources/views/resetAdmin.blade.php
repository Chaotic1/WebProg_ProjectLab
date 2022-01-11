@extends('landingAdmin')
    @section('content')
    {{-- Bagian ini untuk reset password buat Admin. --}}
        <div class="justify-center align-center">
            <h2 class="fw-bold">Register</h2>
            <form action="/reset" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="passMember" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="passMember" name="oldPass"  aria-describedby="pass-help">
                    <div class="form-text" id="pass-help">Minimum 8 characters</div>
                </div>
                <div class="mb-3">
                    <label for="passMember" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="passMember" name="newPass"  aria-describedby="pass-help">
                    <div class="form-text" id="pass-help">Minimum 8 characters</div>
                </div>
                <div class="mb-3">
                    <label for="CpassMember" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" name="newConfirm"  id="CpassMember">
                </div>
                <button type="submit" class="btn btn-primary">Reset Pass</button>
            </form>
        </div>

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