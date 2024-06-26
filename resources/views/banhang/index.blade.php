@extends('layout.master')
@section('content')	 
 <!-- top cards -->
        <div class="container" id="top-cards">
        <div class="row">
            <div class="col-md-5 py-3 py-md-0">
                <div class="card" style="background-color: #a9a9a926;">
                    <img src="./image/topcard1.png" alt="">
                    <div class="card-img-overlay">
                        <h5 class="card-titel">Đồng hồ thông minh</h5>
                        <p>Sự kết hợp hoàn hảo giữa phong cách và sự tiện dụng.!</p>
                        <p><strong>$200.000 <strike>$100.000</strike></strong></p>
                        <button>Order Now</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card" style="background-color: #a9a9a926;">
                    <img src="./image/topcard2.png" alt="">
                    <div class="card-img-overlay">
                        <h5 class="card-titel">Giày Nike</h5>
                        <p>Sự kết hợp hoàn hảo giữa phong cách và sự tiện dụng.! Provident, ratione!</p>
                        <p><strong>$150.000 <strike>$90.000</strike></strong></p>
                        <button>Order Now</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <div class="card" style="background-color: #a9a9a926;">
                    <img src="./image/topcard3.png" alt="">
                    <div class="card-img-overlay">
                        <h5 class="card-titel">Túi</h5>
                        <p>Sự kết hợp hoàn hảo giữa phong cách và sự tiện dụng.!</p>
                        <p><strong>$50.000 <strike>$60.000</strike></strong></p>
                        <button>Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top cards -->
    

    <!-- banner -->
    <div class="banner">
        <div class="content">
            <h1>Được giảm giá tới 50%</h1>
            <p> Chất liệu thường là cotton, vải thun hoặc các loại vải co giãn khác, giúp áo co dãn tốt và thoải mái khi mặc.</p>
            <div id="bannerbtn"><button>SHOP NOW</button></div>
        </div>
    </div>
    <!-- banner -->
<!-- product cards -->
<div class="container" id="product-cards">
    <h1 class="text-center">PRODUCT</h1>
    <div class="row" style="margin-top: 30px;">
        @foreach($products as $product)
            <div class="col-md-3 py-3 py-md-0">
                <div class="card product-card">
                    <div class="card-body">
                        <a href="{{ route('product.show', ['id' => $product->id]) }}">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            <h3>{{ $product->name }}</h3>
                        </a>
                        <div class="star">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $product->rating)
                                    <i class="fas fa-star checked"></i>
                                @else
                                    <i class="fas fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <h5>${{ $product->price }} <strike>$50.000</strike> 
                            <span>
                                <i class="fa-solid fa-cart-shopping add-to-cart" 
                                    data-id="{{ $product->id }}" 
                                    data-name="{{ $product->name }}" 
                                    data-price="{{ $product->price }}" 
                                    data-image="{{ asset($product->image) }}">
                                </i> 
                                <img class="heart-image" width="25" height="25" src="https://bizweb.dktcdn.net/100/451/884/themes/857425/assets/heart.png?1650269474235" alt="Thêm vào yêu thích" data-id="{{ $product->id }}">
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="clothe.html" id="viewmorebtn">View More</a>
</div>

<!-- product cards -->


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hàm để kiểm tra và tái áp dụng trạng thái yêu thích sau khi tải lại trang
            function applyFavoritesState() {
                var heartImages = document.querySelectorAll('.heart-image');

                heartImages.forEach(image => {
                    var productId = image.getAttribute('data-id');
                    var isFavorite = localStorage.getItem(`favorite_${productId}`) === 'true';

                    if (isFavorite) {
                        image.src = 'https://bizweb.dktcdn.net/100/451/884/themes/857425/assets/heartadd.png?1650269474235';
                        image.alt = "Bỏ yêu thích";
                    } else {
                        image.src = 'https://bizweb.dktcdn.net/100/451/884/themes/857425/assets/heart.png?1650269474235';
                        image.alt = "Thêm vào yêu thích";
                    }
                });
            }

            // Bắt sự kiện click vào hình ảnh yêu thích
            var heartImages = document.querySelectorAll('.heart-image');

            heartImages.forEach(image => {
                image.addEventListener('click', function(event) {
                    var productId = event.target.getAttribute('data-id');
                    var isFavorite = localStorage.getItem(`favorite_${productId}`) === 'true';

                    // Gửi yêu cầu Ajax để toggle trạng thái yêu thích của sản phẩm
                    axios.post(`/products/${productId}/toggleFavorite`)
                        .then(response => {
                            console.log(response.data); // Kiểm tra phản hồi từ server

                            // Cập nhật trạng thái yêu thích trong Local Storage
                            localStorage.setItem(`favorite_${productId}`, !isFavorite);

                            // Đổi hình ảnh trái tim để phản ánh trạng thái mới
                            if (!isFavorite) {
                                event.target.src = 'https://bizweb.dktcdn.net/100/451/884/themes/857425/assets/heartadd.png?1650269474235';
                                event.target.alt = "Bỏ yêu thích";
                            } else {
                                event.target.src = 'https://bizweb.dktcdn.net/100/451/884/themes/857425/assets/heart.png?1650269474235';
                                event.target.alt = "Thêm vào yêu thích";
                            }
                        })
                        .catch(error => {
                            console.error('Error toggling favorite status:', error);
                        });
                });
            });

            // Áp dụng trạng thái yêu thích khi tải lại trang
            applyFavoritesState();
        });
    </script>
    <style>
    .product-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .product-card img {
        transition: opacity 0.3s;
    }

    .product-card:hover img {
        opacity: 0.8;
    }
</style>


@endsection