@extends('master.admin.master')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card border-secondary">
                    <div class="card-header bg-secondary">
                        <h4>Order Basic Info</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Order Id</th>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                                <th>Order Total Amount</th>
                                <td>{{$order->order_total}}</td>
                            </tr>
                            <tr>
                                <th>Order Tax Amount</th>
                                <td>{{$order->tax_total}}</td>
                            </tr>
                            <tr>
                                <th>Shipping Cost</th>
                                <td>{{$order->shipping_cost}}</td>
                            </tr>
                            <tr>
                                <th>Order Delivery Address</th>
                                <td>{{$order->delivery_address}}</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>{{$order->order_status}}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{$order->order_date}}</td>
                            </tr>
                            <tr>
                                <th>Payment Type</th>
                                <td>{{$order->payment_type == 1 ? 'Cash on delivery' : 'Online Payment'}}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{$order->payment_status}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div class="card-header bg-secondary"><h4>Order Product Info</h4></div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Product Quantity</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderDetails as $orderProduct)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$orderProduct->product_name}}</td>
                                    <td>{{$orderProduct->product_price}}</td>
                                    <td>{{$orderProduct->product_qty}}</td>
                                    <td>{{$orderProduct->product_price * $orderProduct->product_qty}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card border-secondary">
                    <div class="card-header bg-secondary">
                        <h4>Order Customer Info</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Customer Name</th>
                                <td>{{$order->customer->name}}</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td>{{$order->customer->mobile}}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{$order->customer->email}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

