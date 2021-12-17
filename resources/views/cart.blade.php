@extends('landingMember')

@section('content')
    @foreach ($cart_details as $item)
        Book Name: <b>{{ $item->book->title }}</b> 
        Book Author: <b>{{ $item->book->author }}</b>
        Price: <b>Rp.{{ $item->book->price }}</b> 
        Quantity: <b>{{ $item->quantity }}</b> 
        Subtotal: <b>{{ $item->subtotal }}</b>
        <form action="/cart/delete/{{ $item->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit">Delete Item</button>
        </form>
        
        <a href="/update/member/detail/{{ $item->book->id }}"><button type="submit">View Item</button></a>
        <br> 
    @endforeach
    <br>
    <h4>Grand Total: {{ $carts->grand_total }}</h4>
    <div>
        <form action="">
            <button type="submit">Checkout</button>
        </form>
    </div>
@endsection