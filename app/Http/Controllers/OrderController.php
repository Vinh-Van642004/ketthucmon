<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth; 
use Illuminate\Support\Facades\Session;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Trạng thái đơn hàng đã được cập nhật!');
    }
    
    public function myOrders()
    {
        // Lấy user_id từ Session
        $userId = Session::get('user')->id;

        // Lấy danh sách đơn hàng của người dùng
        $orders = Order::where('user_id', $userId)->get();

        // Trả về view để hiển thị các đơn hàng này
        return view('customer.orders', compact('orders'));
    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->name = $request->input('name');
        $order->gender = $request->input('gender');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->notes = $request->input('notes');
        
        $order->save();

        return redirect()->route('orders.my')->with('success', 'Thông tin đơn hàng đã được cập nhật!');
    }
    
}
