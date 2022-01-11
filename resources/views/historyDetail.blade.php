@extends('landingMember')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Book Name</th>
                <th scope="col">Book Author</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                @if ($detail->header_id == $headers->id)
                <tr>
                    <td>{{ $detail->title }}</td>
                    <td>{{ $detail->author }}</td>
                    <td>{{ $detail->price }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->price * $detail->quantity }}</td>
                    <td>
                        <a href="/history/detail/book/{{ $detail->book_id }}"><button type="submit" class="btn btn-secondary">View Item</button></a>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    
    @foreach ($details as $detail)

        @if ($detail->header_id == $headers->id)
            <h4>Grand Total: {{ $detail->grand_total }}</h4>
            @break
        @endif
        
    @endforeach

@endsection