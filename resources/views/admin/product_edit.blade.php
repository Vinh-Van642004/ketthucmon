@extends('layout1.master')
@section('content')	 
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Name" value="{{ $product->name }}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="price" placeholder="Please Enter Price" value="{{ $product->price }}" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Current Image</label>
                        <div>
                            <img src="{{ asset($product->image) }}" alt="" style="max-width: 100px; max-height: 100px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>New Image</label>
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection