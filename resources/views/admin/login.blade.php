<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Thay đổi đường dẫn tới CSS của bạn nếu cần -->
<style>
   body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Để căn giữa trang theo chiều dọc */
}

.login-page {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 500px; /* Điều chỉnh độ rộng tối đa của khung form */
    width: 100%; /* Khung form sẽ chiếm toàn bộ độ rộng của .login-page */
}

.login-container {
    text-align: center;
}

.login-container h1 {
    margin-bottom: 20px;
}

.login-container label {
    display: block;
    margin-bottom: 8px;
}

.login-container input[type="email"],
.login-container input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.login-container button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 12px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 3px;
    cursor: pointer;
    width: 100%; /* Nút login sẽ chiếm toàn bộ độ rộng của form */
}

.login-container button[type="submit"]:hover {
    background-color: #45a049;
}

.error-message {
    color: #f44336;
    margin-top: 5px;
}
</style>
</head>
<body>

<div class="login-page">
    <div class="login-container">
        <h1>Đăng nhập Admin</h1>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">

            <button type="submit">Login</button>

            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </form>
    </div>
</div>

</body>
</html>