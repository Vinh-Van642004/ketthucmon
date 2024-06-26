@extends('layout.master')
@section('content') 
<div class="container">
    <h2>Chỉnh sửa thông tin đơn hàng</h2>
    <form action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Họ tên:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $order->name) }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Giới tính:</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="male" {{ old('gender', $order->gender) == 'male' ? 'selected' : '' }}>Nam</option>
                <option value="female" {{ old('gender', $order->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
                <option value="other" {{ old('gender', $order->gender) == 'other' ? 'selected' : '' }}>Khác</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $order->email) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $order->address) }}" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Điện thoại:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $order->phone) }}" required>
        </div>
        
        <div class="form-group">
            <label for="note">Ghi chú:</label>
            <textarea name="notes" id="notes" class="form-control" required>{{ old('notes', $order->notes) }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
</div>
@endsection