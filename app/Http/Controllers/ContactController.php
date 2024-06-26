<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactReplyMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create($request->all());

        return redirect()->route('contact.form')->with('success', 'Contact message sent successfully!');
    }

    public function adminIndex()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function showReplyForm($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.reply', compact('contact'));
    }

    public function sendReply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:1000',
        ]);

        $contact = Contact::findOrFail($id);

        // Logic gửi email phản hồi
        Mail::to($contact->email)->send(new ContactReplyMail($request->reply));

        // Cập nhật trạng thái liên hệ
        $contact->status = true;
        $contact->save();

        return redirect()->route('admin.contacts')->with('success', 'Phản hồi đã được gửi và trạng thái đã được cập nhật!');
    }
}
