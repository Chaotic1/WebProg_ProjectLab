@extends('landingMember')

@section('content')

{{-- Bagian dari cart. Member bisa liat cart dia isinya apa saja.
    @foreach ($cart_details as $item)
        Book Name: <b>{{ $item->book->title }}</b> 
        Book Author: <b>{{ $item->book->author }}</b>
        Price: <b>Rp.{{ $item->book->price }}</b> 
        Quantity: <b>{{ $item->quantity }}</b> 
        Subtotal: <b>{{ $item->subtotal }}</b>
    Bagian ini untuk delete item dari cart
        <form action="/cart/delete/{{ $item->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit">Delete Item</button>
        </form>
    Bagian ini untuk update item dari cart
        <a href="/update/member/detail/{{ $item->book->id }}"><button type="submit">View Item</button></a>
        <br> 
    @endforeach
    <br>
    <h4>Grand Total: {{ $carts->grand_total }}</h4>
    Bagian ini untuk checkout, dimana cartnya bakal kosong lagi
    <div>
        <form action="/checkout" method="POST" enctype="multipart/form-data">
            @csrf
            <button type="submit">Checkout</button>
        </form>
    </div> --}}

    <div class="container">
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
                @php
                    $flag = 0
                @endphp
                @foreach ($cart_details as $item)
                    <tr>
                        <td>{{ $item->book->title }}</td>
                        <td>{{ $item->book->author }}</td>
                        <td>{{ $item->book->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->subtotal }}</td>
                        <td>
                            <form action="/cart/delete/{{ $item->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Delete Item</button>
                            </form>
                            <a href="/update/member/detail/{{ $item->book->id }}"><button type="submit">View Item</button></a>
                        </td>
                    </tr>
                    @php
                        $flag = 1
                    @endphp
                @endforeach
            </tbody>
        </table>
        <h5>Grand Total: {{ $carts->grand_total }}</h5>
        @if ($flag == 0)
            No items yet in the cart....
        @else
            <div>
                <form action="/checkout" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit">Checkout</button>
                </form>
            </div>
        @endif
    </div>

    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

@endsection