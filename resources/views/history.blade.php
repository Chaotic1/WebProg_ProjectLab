@extends('landingMember')

@section('content')

{{-- Bagian ini bagian dari transaction. Member bisa liat transaction dia. Dia juga bisa liat detail dari transaction dia --}}

    {{-- <div>
        @foreach ($headers as $header)
            UUID: {{ $header->uuid }}
            Transaction Date: {{ $header->created_at }}
            <a href="/history/detail/{{ $header->id }}"><button type="submit">View Details</button></a>
            <br>
        @endforeach
    </div> --}}

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
                <td>{{ $header->uuid }}</td>
                <td>{{ $header->created_at }}</td>
                <td>
                    <a href="/history/detail/{{ $header->id }}"><button type="submit">View Details</button></a>
                </td>
            @endforeach
        </tbody>
    </table>

@endsection