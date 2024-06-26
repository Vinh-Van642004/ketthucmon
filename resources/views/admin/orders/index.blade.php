@extends('layout1.master')

@section('content')
<style>
    .bg-danger {
        background-color: #f8d7da !important;
    }
    .bg-success {
        background-color: #d4edda !important;
    }
    .text-white {
        color: #ffffff !important;
    }
</style>


<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product <small>List</small></h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Note</th>
                        <th>Phone</th>
                        <th>Payment Method</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product ID</th>
                        <th>Trạng thái</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->gender }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->notes }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->product_price }}</td>
                        <td>{{ $order->product_id }}</td>
                        <td class="
                            @if($order->status == 'đã hủy')
                                bg-danger text-black
                            @elseif($order->status == 'đã giao')
                                bg-success text-black
                            @endif
                        ">
                            {{ $order->status }}
                        </td>
                        <td>
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                <select name="status" onchange="this.form.submit()">
                                    <option value="Chờ Duyệt" {{ $order->status == 'Chờ Duyệt' ? 'selected' : '' }}>Chờ Duyệt</option>
                                    <option value="đang giao" {{ $order->status == 'đang giao' ? 'selected' : '' }}>Đang giao</option>
                                    <option value="đã giao" {{ $order->status == 'đã giao' ? 'selected' : '' }}>Đã giao</option>
                                    <option value="đã hủy" {{ $order->status == 'đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
