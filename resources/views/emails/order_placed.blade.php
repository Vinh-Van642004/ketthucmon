<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xác nhận đơn hàng</title>
</head>
<body>
    <h2>Xác nhận đơn hàng</h2>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng chúng tôi. Dưới đây là chi tiết đơn hàng của bạn:</p>
    <p><strong>Tên sản phẩm:</strong> {{ $order->product_name }}</p>
    <p><strong>Giá sản phẩm:</strong> ${{ $order->product_price }}</p>
    <p><strong>Thông tin người nhận:</strong></p>
    <ul>
        <li><strong>Họ tên:</strong> {{ $order->name }}</li>
        <li><strong>Giới tính:</strong> {{ $order->gender }}</li>
        <li><strong>Email:</strong> {{ $order->email }}</li>
        <li><strong>Địa chỉ:</strong> {{ $order->address }}</li>
        <li><strong>Điện thoại:</strong> {{ $order->phone }}</li>
        <li><strong>Ghi chú:</strong> {{ $order->notes }}</li>
    </ul>
    <p><strong>Hình thức thanh toán:</strong> {{ $order->payment_method }}</p>
</body>
</html>
