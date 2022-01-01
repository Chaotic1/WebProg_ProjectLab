@extends('landingAdmin')

@section('content')

    <div class="card m-4">
        <div class="card-body">
            <h5 class="card-title">User Detail</h5>
            <form action="/manageUser/detail/{{ $users->id }}" method="POST" class="row g-3">
                @method('PUT')
                @csrf
                <div class="input-group">
                    <span class="input-group-text" id="name">Name</span>
                    <input type="text" name="name" class="form-control" value="{{ $users->name }}" aria-describedby="name">
                </div> <br>
                <div class="input-group">
                    <span class="input-group-text" id="email">Email</span>
                    <input type="text" name="email" class="form-control" value="{{ $users->email }}" aria-describedby="email">
                </div> <br>
                <div class="input-group">
                    <span class="input-group-text" id="role">Role</span>
                    <input type="text" name="role" class="form-control" value="{{ $users->role }}" aria-describedby="role">
                </div> <br>
        
                <button type="submit" class="btn btn-primary col-auto">Update</button>
            </form>
        </div>
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