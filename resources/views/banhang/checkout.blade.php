@extends('layout.master')
@section('content')	 
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="{{ asset('source/product/checkout.css') }}"> -->
    <link rel="stylesheet" href="source/product/checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ZSJZhFq8CKEoPUtGfKzQhO5+VyybDWzNlIqu46D7qNblhC5ghAKijA21Fwsh1Z/6HDNnQi3fzoyt+j1R9IqRZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
    .input-group {
        position: relative;
    }

    .input-group-addon.success-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        display: none; /* Ẩn ban đầu */
        color: #28a745; /* Màu xanh lá cây */
    }
</style>

  <body>
  <div class="container">
    <div id="content">
        <form action="{{ route('checkout.submit') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" name="name" placeholder="Họ tên" required>
                    </div>
                    <div class="form-block">
                        <label>Giới tính </label>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
                    </div>
                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required placeholder="example@gmail.com">
                    </div>
                    <div class="form-block">
                        <label for="address">Địa chỉ*</label>
                        <input type="text" id="address" name="address" placeholder="Street Address" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="notes"></textarea>
                    </div>
                    <div class="form-block">
                        <label for="coupon_code">MÃ GIẢM GIÁ</label>
                        <div class="input-group">
                            <input type="text" id="coupon_code" name="coupon_code" placeholder="Nhập mã giảm giá (nếu có)">
                            <span class="input-group-addon success-icon">
                                <i class="fas fa-check-circle"></i>
                            </span>
                        </div>
                    </div>



                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                    <div class="media">
                                        <img width="25%" src="{{ $product->image }}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{ $product->name }}</p>
                                            <span class="color-gray your-order-info">Giá: ${{ $product->price }}</span>
                                            
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="product_name" value="{{ $product->name }}">
                                            <input type="hidden" name="product_price" value="{{ $product->price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                            <div class="pull-left"><p class="your-order-f18">Phí vận chuyển:</p></div>
                            <div class="pull-right"><h5 class="color-black">$25.000</h5></div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="your-order-item">
                            <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                            <div class="pull-right"><h5 class="color-black" id="total_amount">${{ number_format($product->price + 25.000, 3, '.', ',') }}</h5></div>
                            <div class="clearfix"></div>
                        </div>


                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng</label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>
                                </li>
                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM">
                                    <label for="payment_method_cheque">Chuyển khoản</label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Nguyễn A
                                        <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var couponCodeInput = document.getElementById('coupon_code');
        var successIcon = document.querySelector('.success-icon');

        couponCodeInput.addEventListener('input', function() {
            if (couponCodeInput.value.trim() !== '') {
                successIcon.style.display = 'inline-block';
            } else {
                successIcon.style.display = 'none';
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#payment_method_bacs').click(function() {
            $('.payment_box.payment_method_bacs').css('display', 'block');
            $('.payment_box.payment_method_cheque').css('display', 'none');
        });

        $('#payment_method_cheque').click(function() {
            $('.payment_box.payment_method_bacs').css('display', 'none');
            $('.payment_box.payment_method_cheque').css('display', 'block');
        });
    });
</script>
</body>
</html>
@endsection