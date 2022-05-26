@extends('master.front.master')

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"> Please fill up all the information carefully </h6>
                                <form action="{{route('new-order')}}" method="POST">
                                    @csrf
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Full Name</label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            @if($customer)
                                                                <input type="text" name="name" value="{{$customer->name}}" readonly placeholder="Full Name"/>
                                                            @else
                                                                <input type="text" required name="name" placeholder="Full Name"/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        @if($customer)
                                                            <input type="email" name="email" value="{{$customer->email}}" readonly placeholder="Email Address"/>
                                                        @else
                                                            <input type="email" name="email" required placeholder="Email Address"/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        @if($customer)
                                                            <input type="number" value="{{$customer->mobile}}" readonly name="mobile" placeholder="Phone Number"/>
                                                        @else
                                                            <input type="number" required name="mobile" placeholder="Phone Number"/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address</label>
                                                    <div class="form-input form">
                                                        <textarea name="delivery_address" placeholder="Delivery Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="radio" checked id="checkbox-3" value="1" name="payment_method"/>
                                                    <label for="checkbox-3"><span></span></label>
                                                    <p>Cash On Delivery</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="radio" id="checkbox-4" value="2" name="payment_method"/>
                                                    <label for="checkbox-3"><span></span></label>
                                                    <p>Online Payment</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button type="submit" class="btn" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Confirm Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title text-center">Your Cart Summery</h5>
                            <div class="sub-total-price">
                                @php($sum = 0)
                                @foreach($items as $item)
                                    <div class="total-price">
                                        <p class="value border p-2">{{$item->name}} : ({{$item->quantity}} * {{$item->price}}) </p>
                                        <p class="price border p-2">{{ $item->quantity * $item->price}}</p>
                                    </div>
                                    @php($sum = $sum + ($item->quantity * $item->price))
                                @endforeach
                                    <div class="total-price border mb-1">
                                        <p class="value p-2">Sub Total:</p>
                                        <p class="price p-2">{{number_format($sum)}}</p>
                                    </div>
                                <div class="total-price border mb-1">
                                    <p class="value p-2">Tax Amount:</p>
                                    <p class="price p-2">{{$tax = round(($sum*15)/100)}}</p>
                                </div>
                                    <div class="total-price border">
                                        <p class="value p-2">Shipping Cost :</p>
                                        <p class="price p-2">{{$shipping = 50 }}</p>
                                    </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value p-2">Grand Total:</p>
                                    <p class="price p-2">Tk. {{number_format($sum + $tax + $shipping)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
