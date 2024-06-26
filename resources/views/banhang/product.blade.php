@extends('layout.master')
@section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
                body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .product-detail-container {
            display: flex;
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
        }

        .product-image-section {
            flex: 0 0 461px; /* Set the width to match the image */
            margin-right: 40px; /* Adjust this value to increase or decrease the space between the image and the text */
            text-align: center;
        }

        #main-product-image {
            width: 100%;
            height: 461px;
            object-fit: cover;
            border: 2px solid #ccc; /* Add border */
            border-radius: 10px;
        }

        .product-info-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Chia đều khoảng cách giữa các phần tử */
        }

        .product-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .product-rating {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .stars .fa-star {
            color: #f8d64e;
        }

        .stars .full-star {
            color: #f8d64e;
        }

        .rating-text {
            margin-left: 10px;
            color: #777;
        }

                .product-price {
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1.2em;
            color: #e74c3c;
            margin-bottom: 10px;
        }

        .product-description {
            margin-bottom: 10px;
            color: #333;
            
        white-space: pre-line; 

        }

        .product-quantity {
            margin-bottom: 10px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
        }

        .quantity-controls input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
        }

        .available-quantity {
            margin-left: 10px;
            color: #777;
        }

        .product-actions {
            display: flex;
            align-items: center;
            margin-top: auto; /* Để các nút ở dưới cùng */
        }

        .buy-now-btn {
            padding: 10px 20px;
            font-size: 1em;
            background: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    
</style>
</head>
<body>
    <div class="product-detail-container">
        <div class="product-image-section">
            <img id="main-product-image" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="product-info-section">
        <h1 class="product-title" style="font-weight: bold;">{{ $product->name }}</h1>
            <div class="product-rating">
                <div class="stars">
                    <i class="fa fa-star full-star"></i>
                    <i class="fa fa-star full-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <span class="rating-text">Khá đấy (1/5 từ 1 lượt đánh giá)</span>
            </div>
            <div class="product-price">{{ $product->price }} đ</div>
            <div class="product-description">
                {!! $product->description !!}
            </div>
            <div class="product-quantity">
                <label for="quantity">Số lượng</label>
                <div class="quantity-controls">
                    <button class="minus-btn">-</button>
                    <input type="text" id="quantity" value="1">
                    <button class="plus-btn">+</button>
                </div>
                <span class="available-quantity">1,000 sản phẩm có sẵn</span>
            </div>
            <div class="product-actions">
                <form action="{{ route('checkout') }}" method="get">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="buy-now-btn">Mua ngay</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="scripts.js"></script>

</body>
</html>
<script>
                function changeImage(src) {
                document.getElementById('main-product-image').src = src;
            }

            $(document).ready(function(){
                $(".product-thumbnail-carousel").owlCarousel({
                    loop: false,
                    margin: 10,
                    responsiveClass: true,
                    items: 3,
                    dot: true,
                    nav: true,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true
                });

                $('.minus-btn').click(function(){
                    let input = $('#quantity');
                    let value = parseInt(input.val());
                    if (value > 1) {
                        input.val(value - 1);
                    }
                });

                $('.plus-btn').click(function(){
                    let input = $('#quantity');
                    let value = parseInt(input.val());
                    input.val(value + 1);
                });

                $('#quantity').on('input', function(){
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
            });

</script>
@endsection

<style>
    #product-detail .product-image {
        max-width: 100%;
        height: auto;
    }
    #product-detail .product-name {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    #product-detail .product-details {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
    }
    #product-detail .product-price {
        font-size: 2rem;
        margin-bottom: 2rem;
    }
    #product-detail .top-icons a {
        color: #555;
        transition: color 0.3s;
    }
    #product-detail .top-icons a:hover {
        color: #007bff;
    }
    .top-icons {
        display: flex;
        align-items: center;
    }
    .product-detail-box {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
</style>