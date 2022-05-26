@extends('master.front.master')

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">My Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="list-group list-group-flush">
                            <a href="" class="list-group-item">My Profile</a>
                            <a href="{{route('customer-change-password')}}" class="list-group-item">Change Password</a>
                            <a href="" class="list-group-item">All Order</a>
                            <a href="" class="list-group-item">Cancel Order</a>
                            <a href="" class="list-group-item">My Wishlist</a>
                            <a href="" class="list-group-item">Payment History</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-danger text-center">{{Session::get('message')}}</p>
                            <form action="{{route('update-customer-password')}}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Your Previous Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="prev_password"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Your New Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Confirm New Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="confirm_password"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="Change Password"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
