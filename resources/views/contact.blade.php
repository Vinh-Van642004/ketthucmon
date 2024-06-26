@extends('layout.master')
@section('content') 
<div class="container" id="contact">
    <h1 class="text-center">CONTACT US</h1>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-4 py-3 py-md-0">
            <div class="card">
                <i class="fas fa-phone"> Phone</i>
                <h6>+00000000000000000</h6>
            </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
            <div class="card">
                <i class="fa-solid fa-envelope"> Email</i>
                <h6>example@gmail.com</h6>
            </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
            <div class="card">
                <i class="fa-solid fa-location-dot"> Address</i>
                <h6>Karachi Sinfh Pakistan</h6>
            </div>
        </div>
    </div>

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-4 py-3 py-md-0">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <input type="text" name="phone" class="form-control" placeholder="Phone" required>
            </div>
        </div>
        <div class="form-group" style="margin-top: 30px;">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div id="messagebtn" class="text-center" style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary">Message</button>
        </div>
    </form>
</div>
@endsection
