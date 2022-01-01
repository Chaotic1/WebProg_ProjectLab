@extends('landingMember')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">UUID</th>
                <th scope="col">Transaction Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($headers as $header)
                <tr>
                    <td>{{ $header->uuid }}</td>
                    <td>{{ $header->created_at }}</td>
                    <td>
                        <a href="/history/detail/{{ $header->id }}"><button type="submit" class="btn btn-primary">View Details</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection