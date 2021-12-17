@extends('landingMember')

@section('content')

    <div>
        @foreach ($headers as $header)
            UUID: {{ $header->uuid }}
            Transaction Date: {{ $header->created_at }}
            <a href="/history/detail/{{ $header->id }}"><button type="submit">View Details</button></a>
            <br>
        @endforeach
    </div>

@endsection