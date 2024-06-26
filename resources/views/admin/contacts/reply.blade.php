@extends('layout1.master')
@section('content')	 
        <div class="container" id="admin-reply">
    <h1 class="text-center">Phản hồi liên hệ</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Liên hệ từ: {{ $contact->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $contact->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p class="card-text"><strong>Message:</strong> {{ $contact->message }}</p>
            <form action="{{ route('admin.contacts.sendReply', $contact->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="reply">Phản hồi</label>
                    <textarea class="form-control" name="reply" id="reply" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Gửi phản hồi</button>
            </form>
        </div>
    </div>
</div>
        

@endsection