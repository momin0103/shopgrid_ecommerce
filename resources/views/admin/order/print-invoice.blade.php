<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Invoice</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .border
        {
            border: 1px solid green;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="title">
                            <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" />
                        </td>

                        <td>
                            Invoice #: 00{{$order->id}}<br />
                            Order Date: {{$order->order_date}}<br />
                            Invoice Date: {{date('Y-m-d')}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td>
                            <h4><u>Billing Info</u></h4>

                            {{$customer->name}}<br />
                            {{$customer->mobile}}<br />
                            {{$customer->email}}
                        </td>

                        <td>
                            <h4><u>Shipping Info</u></h4>
                            {{$order->delivery_address}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td colspan="3">Payment Method</td>

            <td></td>
        </tr>

        <tr class="details">
            <td colspan="3">{{$order->payment_type == 1 ? 'Cash On Delivery' : 'Online'}}</td>
            <td></td>
        </tr>

        <tr class="heading border" style="text-align: center;">
            <td class="border">Item</td>
            <td class="border">Unit Price</td>
            <td class="border">Quantity</td>
            <td class="border">Total Price</td>
        </tr>
        @php($sum = 0)
        @foreach($products as $orderProduct)
            <tr class="item border text-center">
                <td class="border">{{$orderProduct->product_name}}</td>
                <td class="border">{{$orderProduct->product_price}}</td>
                <td class="border">{{$orderProduct->product_qty}}</td>
                <td class="border">{{$orderProduct->product_qty * $orderProduct->product_price}}</td>
            </tr>
            @php($sum = $sum + ($orderProduct->product_qty * $orderProduct->product_price))
        @endforeach
        <tr class="total">
            <td colspan="4" class="border text-right pr-3">Sub Total: TK. {{$sum}}</td>
        </tr>
        <tr class="total">
            <td colspan="4" class="border text-right pr-3">Tax Amount: TK. {{$tax = round(($sum*15)/100)}}</td>
        </tr>
        <tr class="total">
            <td colspan="4" class="border text-right pr-3">Shipping Cost: TK. {{$shippingCost = 50}}</td>
        </tr>
        <tr class="total">
            <td colspan="4" class="border text-right pr-3">Total Payable: TK. {{$sum+$tax+$shippingCost}}</td>
        </tr>
    </table>
</div>
</body>
</html>

