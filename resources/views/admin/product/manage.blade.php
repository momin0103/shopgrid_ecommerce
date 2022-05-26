@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center text-success">{{Session::get('message')}}</p>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Product Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{isset($product->category->name) ? $product->category->name : ''}}</td>
                        <td>{{isset($product->subCategory->name) ? $product->subCategory->name : ''}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->code}}</td>
                        <td><img src="{{asset($product->image)}}" alt="" height="50" width="80"/></td>
                        <td>{{$product->status}}</td>
                        <td>
                            <a href="{{route('edit-product', ['id' => $product->id])}}" class="btn btn-success btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{route('delete-product', ['id' => $product->id])}}" onclick="return confirm('Are you sure to delete this..');" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
