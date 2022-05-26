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
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Sub Category Description</th>
                        <th>Sub Category Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sub_categories as $sub_category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$sub_category->category->name}}</td>
                            <td>{{$sub_category->name}}</td>
                            <td>{{$sub_category->description}}</td>
                            <td><img src="{{asset($sub_category->image)}}" alt="" height="50" width="80"/></td>
                            <td>{{$sub_category->status}}</td>
                            <td>
                                <a href="{{route('edit-sub-category', ['id' => $sub_category->id])}}" class="btn btn-success btn-xs">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('delete-sub-category', ['id' => $sub_category->id])}}" onclick="return confirm('Are you sure to delete this..');" class="btn btn-danger btn-xs">
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
