@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <p class="text-center text-success">{{Session::get('message')}}</p>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Brand Name</th>
                        <th>Brand Description</th>
                        <th>Brand Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->description}}</td>
                        <td><img src="{{asset($brand->image)}}" alt="" height="50" width="80"/></td>
                        <td>{{$brand->status}}</td>
                        <td>
                            <a href="{{route('edit-brand', ['id' => $brand->id])}}" class="btn btn-success btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{route('delete-brand', ['id' => $brand->id])}}" onclick="return confirm('Are you sure to delete this..');" class="btn btn-danger btn-xs">
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
