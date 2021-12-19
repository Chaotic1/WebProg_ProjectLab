@extends('landingMember')

@section('content')

{{-- Bagian ini lanjutan dari transaction, dimana member bisa liat seluruh buku yang di beli ole dia. Member juga bisa liat detail bukunya --}}
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
    </div>
    
    <h4>Grand Total: {{ $detail->grand_total }}</h4>

@endsection