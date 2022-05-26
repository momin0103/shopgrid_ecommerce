@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Brand Form</h3>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('update-brand', ['id' => $brand->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$brand->name}}" name="name" id="inputEmail3" placeholder="Brand Name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Brand Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputPassword3" name="description" placeholder="Brand Description">{{$brand->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Brand Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" name="image" accept="image/*"/>
                                    <img src="{{asset($brand->image)}}" alt="" height="100" width="130"/>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-info">Update Category Info</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
