@extends('layout.master')
@section('content') 
<div class="container">
    <h2>My Orders</h2>
    @if ($orders->isEmpty())
        <p>You have no orders.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Sửa thông tin cá nhân</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->product_price }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td><a href="{{ route('order.edit', $order->id) }}" class="btn btn-primary">Sửa</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection