<?php

// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact', compact('contacts'));
    }

    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->message = $request->input('message');
        $contact->contacted_status = false; // Mặc định là "Chưa liên hệ"
        $contact->save();

        return redirect()->back()->with('success', 'Tin nhắn của bạn đã được gửi.');
    }

    // Hàm phản hồi liên hệ
    public function reply(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        // Lưu phản hồi và cập nhật trạng thái
        $contact->reply_message = $request->input('reply_message');
        $contact->contacted_status = true; // Cập nhật trạng thái đã liên hệ
        $contact->save();

        return redirect()->back()->with('success', 'Phản hồi đã được gửi và trạng thái đã được cập nhật!');
    }
    public function products()
{
    $products = Product::all(); // Lấy tất cả sản phẩm từ cơ sở dữ liệu

    return view('admin.product_list', compact('products'));
}


}
