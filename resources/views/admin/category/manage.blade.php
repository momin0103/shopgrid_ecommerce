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
                        <th>Category Description</th>
                        <th>Category Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td><img src="{{asset($category->image)}}" alt="" height="50" width="80"/></td>
                        <td>{{$category->status}}</td>
                        <td>
                            <a href="{{route('edit-category', ['id' => $category->id])}}" class="btn btn-success btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="" onclick="deleteCategory({{$category->id}})" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form action="{{route('delete-category', ['id' => $category->id])}}" method="POST" id="deleteCategoryForm{{$category->id}}">
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteCategory(id) {
                event.preventDefault();
                var check = confirm('Are you sure delete this------');
                if(check)
                {
                    document.getElementById('deleteCategoryForm'+id).submit();
                }
        }
    </script>
@endsection
