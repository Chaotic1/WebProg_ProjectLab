@extends('landingMember')

@section('content')

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
                        <td class="row">
                            <form action="/cart/delete/{{ $item->id }}" method="POST" class="col-auto">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger ">Delete Item</button>
                            </form>
                            <a href="/update/member/detail/{{ $item->book->id }}" class="col"><button type="submit" class="btn btn-secondary">View Item</button></a>
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