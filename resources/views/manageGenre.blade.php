@extends('landingAdmin')
@section('content')

<div class="card m-4">
    <div class="card-body">
        <h5 class="card-title">Insert Genre</h5>
        <form action="/insertGenre" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <span class="input-group-text" id="genre">Genre</span>
                <input type="text" name="name" class="form-control" placeholder="Genre" aria-describedby="genre">
            </div> <br>
            <button type="submit" class="btn btn-primary">Add Genre</button>
        </form>
    </div>
</div>

<div>
    @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
    @endif
    
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

<h5>Genre List</h5>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Genre Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($genres as $genre)
            <tr>
                <td>{{ $genre->name }}</td>
                <td class="row">
                    <a href="manageGenre/detail/{{ $genre->id }}" class="btn btn-secondary col-auto">View Details</a>
                    <form action="/manageGenre/delete/{{ $genre->id }}" method="POST" class="col">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button> 
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection