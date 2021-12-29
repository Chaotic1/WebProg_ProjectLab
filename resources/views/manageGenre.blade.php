@extends('landingAdmin')
@section('content')

{{-- Bagian untuk insert genre baru ke database --}}

{{-- <div>
    <h3>Insert Genre</h3>
    <form action="/insertGenre" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="titleInsert">Name</label><br>
        <input id="titleInsert" type="text" name="name" placeholder="Name"><br>

        <br>

        <button type="submit">Add Genre</button>
    </form> --}}
    {{-- Bagian untuk display semua genre yang ada di database --}}
    {{-- <div>
        <table>
            <tr>
                <th>
                    Genre Name
                </th>
            </tr>
            <tr>
                <td>
                    @foreach ($genres as $genre)
                        
                    <a href="manageGenre/detail/{{ $genre->id }}">{{ $genre->name }}</a> {{-- Takes you to the genre detail page --}}

                    
                         {{-- Bagian untuk delete genre dari database  --}}
                    {{-- <form action="/manageGenre/delete/{{ $genre->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button> 
                    </form>
                    <br>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</div> --}}


<div class="card m-4">
    <div class="card-body">
        <h5 class="card-title">Insert Genre</h5>
        <form action="/insertGenre" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <span class="input-group-text" id="genre">Genre</span>
                <input type="text" class="form-control" placeholder="Genre" aria-describedby="genre">
            </div> <br>
            <button type="submit" class="btn btn-primary">Add Genre</button>
        </form>
    </div>
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
    
@endsection