@extends('landingMember')

@section('content')

{{-- Bagian ini lanjutan dari transaction, dimana member bisa liat seluruh buku yang di beli ole dia. Member juga bisa liat detail bukunya
    <div>
        @foreach ($details as $detail)
            Book Name: <b>{{ $detail->title }}</b> 
            Book Author: <b>{{ $detail->author }}</b>
            Price: <b>Rp.{{ $detail->price }}</b> 
            Quantity: <b>{{ $detail->quantity }}</b> 
            Subtotal: <b>{{ $detail->price * $detail->quantity }}</b>
            <br>
            <a href="/history/detail/book/{{ $detail->book_id }}"><button type="submit">View Item</button></a>
            <br>
        @endforeach
    </div> --}}

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
                <tr>
                    <td>{{ $detail->title }}</td>
                    <td>{{ $detail->author }}</td>
                    <td>{{ $detail->price }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->price * $detail->quantity }}</td>
                    <td>
                        <a href="/history/detail/book/{{ $detail->book_id }}"><button type="submit">View Item</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <h4>Grand Total: {{ $detail->grand_total }}</h4>

@endsection