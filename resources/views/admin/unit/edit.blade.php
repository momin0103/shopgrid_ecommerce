@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Unit Form</h3>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('update-unit', ['id' => $unit->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Unit Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$unit->name}}" name="name" id="inputEmail3" placeholder="Unit Name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Unit Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputPassword3" name="description" placeholder="Unit Description">{{$unit->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-info">Update Unit Info</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
