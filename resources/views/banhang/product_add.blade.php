@extends('layout1.master')
@section('content')	 
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product <small>ADD</small></h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Product Name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Enter Product Price" value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group{{ $errors->has('produced_on') ? ' has-error' : '' }}">
                        <label for="produced_on" class="col-md-4 control-label">Produced On</label>

                        <div class="col-md-6">
                            <input id="produced_on" type="date" class="form-control" name="produced_on" value="{{ old('produced_on') }}" required>

                            @if ($errors->has('produced_on'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('produced_on') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('clothes_id') ? ' has-error' : '' }}">
                        <label for="clothes_id" class="col-md-4 control-label">Clothes ID</label>

                        <div class="col-md-6">
                            <input id="clothes_id" type="text" class="form-control" name="clothes_id" value="{{ old('clothes_id') }}" required>

                            @if ($errors->has('clothes_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('clothes_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Product Status</label>
                        <label class="radio-inline">
                            <input name="status" value="1" checked type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0" type="radio">Invisible
                        </label>
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