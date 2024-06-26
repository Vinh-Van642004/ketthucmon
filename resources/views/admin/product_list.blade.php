@extends('layout1.master')
@section('content')	 
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <h1 class="page-header">Product
                                <small>List</small>
                            
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Loại</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="odd gradeX" align="center">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }} VNĐ</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <img src="{{ asset($product->image) }}" alt="" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>{{ $product-> clothe -> type }}</td>
                    <td class="center">
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <i class="fa fa-trash-o fa-fw"></i>
                            <button type="submit" class="btn btn-link">Delete</button>
                        </form>
                    </td>
                    <td class="center">
                            <i class="fa fa-pencil fa-fw"></i>
                            <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
@endsection