@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Password Change Form</h3>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('admin-update-password')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Previous Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="prev_password" id="inputEmail3" placeholder="Previous Password"/>
                                    <span class="text-danger">{{$errors->has('prev_password') ? $errors->first('prev_password') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="New Password"/>
                                    <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Confirm New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password"/>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-info">Update Password Info</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
