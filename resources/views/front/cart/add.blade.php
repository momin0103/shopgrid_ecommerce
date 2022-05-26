@extends('master.front.master')

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('show-cart')}}">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <p class="text-center text-success">{{Session::get('message')}}</p>
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Unit Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                @php($sum = 0)
                @foreach($items as $item)
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="product-details.html"><img src="{{asset($item->attributes->image)}}" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="product-details.html">
                                   {{$item->name}}</a></h5>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input">
                                <form action="{{route('update-cart-product', ['id' => $item->id])}}" method="POST">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="number" min="1" name="qty" class="form-control" value="{{$item->quantity}}"/>
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{$item->price}}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{$item->quantity * $item->price}}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" href="{{route('delete-cart-item', ['id' => $item->id])}}" onclick="return confirm('Are you sure to delete this.')"><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                @php($sum = $sum + ($item->quantity * $item->price))
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>TK. {{number_format($sum)}}</span></li>
                                        @php($tax = round(($sum * 15)/100))
                                        <li>Tax Amount :<span>TK. {{$tax}}</span></li>
                                        <li>Shipping<span>TK. {{$shipping = 50}}</span></li>
                                        <li class="last">Total Payable<span>TK. {{number_format($sum+$tax+$shipping)}}</span></li>
                                        @php(Session::put('order_total', ($sum+$tax+$shipping)))
                                        @php(Session::put('order_tax', $tax))
                                        @php(Session::put('shipping_cost', $shipping))
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                        <a href="{{route('home')}}" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
