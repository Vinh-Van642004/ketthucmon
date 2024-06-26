<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fashion')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('image/logo2.png') }}">
    <link rel="stylesheet" href="{{ asset('source/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    
    <!-- fonts links -->

<style>
    .cart-container {
        display: none;
        position: fixed;
        right: 20px;
        top: 20px;
        width: 420px;
        background: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        z-index: 1000;
    }
    .cart-header, .cart-footer {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }
    .cart-footer {
        border-top: 1px solid #ccc;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .cart-body {
        padding: 10px;
        max-height: 400px;
        overflow-y: auto;
    }
    .cart-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    .cart-item img {
        width: 50px;
        margin-right: 10px;
    }
    .cart-item-info {
        flex-grow: 1;
    }
    .cart-item-count {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: red;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 14px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .remove-from-cart {
        background-color: #ff0000;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }
    .remove-from-cart:hover {
        background-color: #cc0000;
    }
    .cart-footer button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }
    .cart-footer button:hover {
        background-color: #218838;
    }
</style>
<style>
        .product-image {
            width: 461px;
            height: 461px;
            border: 2px solid black; /* Viền đen */
        }
        /* style.css */
        .messenger-icon {
            position: fixed;
            left: 20px;
            bottom: 20px;
            z-index: 1000; /* Để icon hiển thị trên cùng */
            background-color: #fff; /* Màu nền của icon */
            width: 45px; /* Chiều rộng icon */
            height: 45px; /* Chiều cao icon */
            border-radius: 50%; /* Bo tròn icon */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng cho icon */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .messenger-icon i {
            color: #4267B2; /* Màu sắc của icon */
            font-size: 30px; /* Kích thước của icon */
        }

    </style>
    @yield('css')
</head>
<body>
    @include('layout.topnavbar')

    <div class="container">
        @yield('content')
    </div>

    @include('layout.footer')

    @yield('js')
    <div class="messenger-icon">
        <a href="https://www.facebook.com/messages/t/20531316728" target="_blank">
            <i class="fa-brands fa-facebook-messenger"></i>
        </a>
    </div>

    <a href="#" class="arrow"><i><img src="{{ asset('image/up-arrow.png') }}" alt="" width="50px"></i></a>
    

    <script>
        document.getElementById('logout-form').addEventListener('submit', function(event) {
            event.preventDefault();
            this.submit();
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.add-to-cart').forEach(function(button) {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const price = this.dataset.price;
                const image = this.dataset.image;

                fetch('{{ route('cart.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: id,
                        name: name,
                        price: price,
                        image: image
                    })
                }).then(response => response.json()).then(data => {
                    alert(data.message);
                    updateCartView(data.cart);
                    updateCartItemCount(data.cart);
                });
            });
        });

        document.querySelector('.fa-cart-shopping').addEventListener('click', function() {
            fetch('{{ route('cart.view') }}').then(response => response.json()).then(data => {
                updateCartView(data.cart);
                document.getElementById('cart-container').style.display = 'block';
            });
        });
    });

    function closeCart() {
        document.getElementById('cart-container').style.display = 'none';
    }

    function updateCartView(cart) {
        const cartBody = document.querySelector('.cart-body');
        cartBody.innerHTML = '';

        let totalAmount = 0;

        for (let id in cart) {
            if (cart.hasOwnProperty(id)) {
                const item = cart[id];
                const itemTotal = item.price * item.quantity;
                totalAmount += itemTotal;

                const cartItem = document.createElement('div');
                cartItem.classList.add('cart-item');
                cartItem.innerHTML = `
                    <img src="${item.image}" alt="${item.name}">
                    <div class="cart-item-info">
                        <h5>${item.name}</h5>
                        <p>Price: $${item.price}</p>
                        <p>Quantity: ${item.quantity}</p>
                    </div>
                    <button class="remove-from-cart" data-id="${id}">Remove</button>
                `;
                cartBody.appendChild(cartItem);

                cartItem.querySelector('.remove-from-cart').addEventListener('click', function() {
                    const id = this.dataset.id;
                    fetch('{{ route('cart.remove') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ id: id })
                    }).then(response => response.json()).then(data => {
                        updateCartView(data.cart);
                        updateCartItemCount(data.cart);
                    });
                });
            }
        }

        const cartFooter = document.querySelector('.cart-footer');
        cartFooter.innerHTML = `
            <h5>Total Amount: $${totalAmount}</h5>
            <button onclick="checkout()">Thanh toán</button>
        `;
    }

    function updateCartItemCount(cart) {
        let itemCount = 0;
        for (let id in cart) {
            if (cart.hasOwnProperty(id)) {
                itemCount += cart[id].quantity;
            }
        }
        document.getElementById('cart-item-count').innerText = itemCount;
    }

    function toggleCart() {
        const cartContainer = document.getElementById('cart-container');
        cartContainer.style.display = cartContainer.style.display === 'block' ? 'none' : 'block';
    }
</script>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
