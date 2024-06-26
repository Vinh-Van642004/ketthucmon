<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\DiscountCode; 
use Illuminate\Support\Facades\Session;

class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        return view('banhang.index', compact('products')); // Trả về view 'clothes.index' với dữ liệu sản phẩm
    }
    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('banhang.product', compact('product'));
    }
    public function checkout(Request $request)
    {
        $product = Product::find($request->product_id);
        return view('banhang.checkout', compact('product'));
    }


    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'notes' => 'nullable|string',
            'product_id' => 'required|integer',
            'product_name' => 'required|string',
            'product_price' => 'required|numeric',
            'user_id' => 'required|integer' // Thêm dòng này
        ]);

        $order = new Order();
        $order->name = $request->name;
        $order->gender = $request->gender;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->notes = $request->notes;
        $order->product_id = $request->product_id;
        $order->product_name = $request->product_name;
        $order->product_price = $request->product_price;
        $order->user_id = $request->user_id; // Lưu user_id vào đơn hàng
        $order->save();

        return redirect()->back()->with('success', 'Đã đặt hàng thành công');
    }

    public function submitOrder(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'notes' => 'nullable|string',
            'product_id' => 'required|integer',
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'payment_method' => 'required|string|max:10'
        ]);
    
        // Calculate total amount
        $productPrice = $request->product_price;
        $shippingFee = 25.000;
        $totalAmount = $productPrice + $shippingFee;
    
        // Check if there's a discount code applied
        if (!empty($request->coupon_code)) {
            $discountCode = DiscountCode::where('code', $request->coupon_code)->first();
            if ($discountCode) {
                // Apply discount if valid code found
                $totalAmount -= $discountCode->discount_amount;
            }
        }
    
        // Get user_id from session or request
        $userId = Session::get('user')->id; 
        
     
        $order = Order::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'product_price' => $totalAmount, 
            'payment_method' => $request->payment_method,
            'user_id' => $userId, 
        ]);
    
        // Send email notification
        Mail::to($request->email)->send(new OrderPlaced($order));
        
        // Redirect or respond with success message
        return redirect()->route('orders.my')->with('success', 'Đã đặt hàng thành công');
    }
    

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banhang.product_add');
    }

    // Phương thức lưu sản phẩm mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'produced_on' => 'required|date',
            'clothes_id' => 'required|integer', // Thêm validation cho clothes_id
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Xử lý lưu hình ảnh vào thư mục và tạo tên file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = public_path('images');
            $image->move($imagePath, $imageName);
        }
    
        // Tạo sản phẩm mới và lưu vào cơ sở dữ liệu
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->produced_on = $request->produced_on;
        $product->clothes_id = $request->clothes_id; // Lấy giá trị từ form
        $product->image = '/images/' . $imageName; // Đường dẫn đến hình ảnh
        $product->save();
    
        return redirect()->route('index')->with('success', 'Product added successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
    
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $product->image = 'images/' . $imageName;
        }
    
        $product->save();
    
        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('admin.products')->with('success', 'Đã xóa sản phẩm thành công');
    }
    public function adminProductList()
{
    $products = Product::all();
    return view('admin.product_list', compact('products'));
}
public function userList()
{
    $users = User::all();
    return view('admin.user_list', compact('users'));
}
public function showCategoryProducts($id)
{
    $products = Product::where('clothes_id', $id)->get();
    return view('banhang.index', compact('products'));
}



    
}
