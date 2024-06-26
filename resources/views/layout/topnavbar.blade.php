    <!-- top navbar -->
    <div class="top-navbar">
        <div class="top-icons">
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-facebook-messenger"></i>
        </div>
        <div class="other-links">
        @if(Session::has('user'))
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Session::get('user')->id }}">
        <button type="submit">
            <i class="fa-solid fa-right-from-bracket"></i>
        </button>
    </form>
    <i class="fa-solid fa-user"> Hello, {{ Session::get('user')->name }}!</i>
            @else
                <button id="btn-login"><a href="/dangnhap">Login</a></button>
                <button id="btn-signup"><a href="/dangky">Sign up</a></button>
                <i class="fa-solid fa-user"></i>
            @endif
       
                <i class="fa-solid fa-cart-shopping" onclick="toggleCart()"></i>
                <span id="cart-item-count" class="cart-item-count">0</span>
        <!-- Khu vực giỏ hàng -->
        <div class="cart-container" id="cart-container">
            <div class="cart-header">
                <h5>Giỏ hàng</h5>
                <button class="close-cart" onclick="closeCart()">X</button>
            </div>
            <div class="cart-body">
                <!-- Các sản phẩm trong giỏ hàng sẽ được thêm vào đây -->
            </div>
            <div class="cart-footer">
                <button onclick="checkout()">Thanh toán</button>
                </div>
                </div>

                </div>
    </div>


    <!-- top navbar -->

    <div class="home-section">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="{{ asset('image/logo.png') }}"alt="" width="180px"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars" style="color: white;"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="clothe.html">Clothe</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #1c1c50;">
                        <li><a class="dropdown-item" href="{{ route('category.products', ['id' => 1]) }}">Túi</a></li>
                        <li><a class="dropdown-item" href="{{ route('category.products', ['id' => 2]) }}">Áo</a></li>
                        <li><a class="dropdown-item" href="{{ route('category.products', ['id' => 3]) }}">Giày</a></li>
                        <li><a class="dropdown-item" href="{{ route('category.products', ['id' => 4]) }}">Quần</a></li>
                    </ul>

                  </li>
               
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.store') }}">Contact Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.my') }}">Đơn Hàng</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link"  href="{{ route('favorites.index') }}">Yêu Thích</a>
                  </li>
                </ul>
               
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit" id="search-btn">Search</button>
                </form>
              </div>
            </div>
          </nav>
        <!-- navbar -->





        <!-- home content -->
        <section class="home">
            <div class="content">
                <h3>Giảm giá quần áo lớn nhất
                    <br> <span>Lên đến 50%</span>
                </h3>
                <p>Không chỉ đơn thuần là một bộ áo quần mà nó là sự kết hợp hoàn hảo giữa phong cách và sự tiện dụng.!</p>
                <button id="shopnow">Mua Ngay</button>
            </div>
            <div class="img">
            <img src="{{ asset('image/b2.png') }}" alt="">
            </div>
        </section>
        <!-- home content -->
    </div>
