@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center text-success">{{Session::get('message')}}</p>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Order No</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->customer->name.' ('.$order->customer->mobile.')'}}</td>
                            <td>{{$order->order_total}}</td>
                            <td>{{$order->order_date}}</td>
                            <td>{{$order->order_status}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>
                                <a href="{{route('view-order-detail', ['id' => $order->id])}}" class="btn btn-info btn-xs" title="View Order Detail">
                                    <i class="fa fa-book-open"></i>
                                </a>
                                <a href="{{route('view-order-invoice', ['id' => $order->id])}}" class="btn btn-primary btn-xs" title="View Order Invoice">
                                    <i class="fa fa-list"></i>
                                </a>
                                <a href="{{route('download-order-invoice', ['id' => $order->id])}}" target="_blank" class="btn btn-warning btn-xs" title="Download Order Invoice">
                                    <i class="fa fa-download"></i>
                                </a>
                                <a href="{{route('admin-edit-order', ['id' => $order->id])}}" class="btn btn-success btn-xs {{$order->order_status == 'Complete' ? 'disabled' : ''}}" title="Edit Order">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('admin-delete-order', ['id' => $order->id])}}" onclick="return confirm('Are you sure to delete this..');" class="btn btn-danger btn-xs {{$order->order_status == 'Cancel' ? '' : 'disabled'}}" title="Delete Order">
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
