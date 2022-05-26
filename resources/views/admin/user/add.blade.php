@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add User Form</h3>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('new-admin-user')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="User Name"/>
                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">User Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputPassword3" name="email" placeholder="User Email"/>
                                    <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password"/>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-right">
                            <button type="submit" class="btn btn-info">Create New User</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
