<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion</title>
    <link rel="shortcut icon" type="image" href="./public/image/logo2.png">
    <link rel="stylesheet" href="source/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- fonts links -->
</head>
<body>

    <!-- top navbar -->
    <div class="top-navbar">
        <div class="top-icons">
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
        </div>
        <div class="other-links">
            <button id="btn-login"><a href="/dangnhap">Login</a></button>
            <button id="btn-signup"><a href="/dangky">Sign up</a></button>

            <i class="fa-solid fa-user"></i>
            <i class="fa-solid fa-cart-shopping"></i>
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



        <!-- login -->
        <div class="container login">
    <div class="row">
        <div class="col-md-4" id="side1">
            <h3>Hello Friend!</h3>
            <p>Create New Account</p>
            <div id="btn"><a href="/dangky">Sign up</a></div>
        </div>
        <div class="col-md-8" id="side2">
            <h3>Login Account</h3>
            <form action="/dangnhap" method="POST">
                @csrf
                <div class="inp">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <p>Forgot Your Password</p>
                <div class="icons">
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <div id="login"><button type="submit">LOG IN</button></div>
            </form>
        </div>
    </div>
</div>
        <!-- login -->









<!-- footer -->
<footer id="footer" style="margin-top: 50px;">
<div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 footer-content">
                <h3>Fashion</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, hic?</p>
                <p>
                    Karcahi <br>
                    Sindh <br>
                    Pakistan <br>
                </p>
                <strong><i class="fas fa-phone"></i> Phone: <strong>+000000000000000</strong></strong><br>
                <strong><i class="fa-solid fa-envelope"></i> Email: <strong>example@gmail.com</strong></strong>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Usefull Links</h4>
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Privacy policay</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Services</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, rem!</p>
                <ul>
                    <li><a href="#">Smart phone</a></li>
                    <li><a href="#">Smart watch</a></li>
                    <li><a href="#">Airpods</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Social Network</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, ad?</p>
                <div class="socail-links mt-3">
                    <a href="#" class="twiiter"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="twiiter"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="twiiter"><i class="fa-brands fa-google-plus"></i></a>
                    <a href="#" class="twiiter"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="twiiter"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container py-4">
    <div class="copyright">
        &copy; Copyright <strong>Fashion</strong>.All Rights Reserved
    </div>
    <div class="credits">
        Designed By <a href="#">SA coding</a>
    </div>
</div>
</footer>
<!-- footer -->

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>