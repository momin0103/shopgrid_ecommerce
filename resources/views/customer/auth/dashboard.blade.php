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
                    <h4 class="text-center">My Recent Order</h4>
                    <hr/>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Order No</th>
                                <th>Total Price</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_status}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
