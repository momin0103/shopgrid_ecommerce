@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Sub Category Form</h3>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('update-sub-category', ['id' => $sub_category->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id">
                                        <option> -- Select Category Name -- </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $sub_category->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$sub_category->name}}" name="name" id="inputEmail3" placeholder="Sub Category Name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Sub Category Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputPassword3" name="description" placeholder="Sub Category Description">{{$sub_category->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sub Category Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" name="image" accept="image/*"/>
                                    <img src="{{asset($sub_category->image)}}" alt="" height="100" width="150"/>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-info">Update Sub Category Info</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
