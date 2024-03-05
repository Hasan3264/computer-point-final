<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Computer Point</title>

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

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr class="top">
                    <td colspan="4">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="title">
                                        <img src="{{public_path('Frontend/assets/image/cmlogo.png')}}"
                                            style="width: 100%; max-width: 150px">
                                    </td>
                                    @php
                                    $order = App\Models\Order::find($order_id);
                                    @endphp
                                    <td>
                                        Invoice #: {{$order->order_gen_id}}<br>
                                        Created: {{App\Models\Order::find($order_id)->created_at->format('d-m-y')}}
                                        <br>
                                        Bkash:- 01847289081
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="4">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        Computer Point<br>
                                        1 Dhanmondi, Road #10<br>
                                        Alta Plaza, Dhaka 1205
                                    </td>

                                    <td>
                                        @php
                                        $findOrderBillDetails =App\Models\BillingDetails::where('order_id',
                                        $order_id)->first();
                                        @endphp
                                        {{$findOrderBillDetails->name}}<br>
                                        {{$findOrderBillDetails->phone}} <br>
                                        {{$findOrderBillDetails->address}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr class="heading">
                    <td>Payment Method</td>
                    <td></td>
                    <td></td>

                    <td> @php

                        if($order->delevary_type == 'Cash'){
                        echo 'Cash On Delevary';
                        }
                        elseif($order->delevary_type == 'bkash'){
                        echo 'Payment On Bkash';
                        }
                        @endphp
                    </td>
                </tr>

                <tr class="details">
                    <td>Main Amount</td>
                    <td></td>
                    <td></td>

                    <td>{{ $order->subtotal}} Tk</td>
                </tr>

                <tr class="heading">
                    <td>Product</td>
                    <td>Qti</td>
                    <td>Price</td>
                    <td>Subtotal</td>
                </tr>
                @foreach (App\Models\OrderProduct::where('order_id', $order_id)->get() as $product)
                <tr class="item">
                    <td style="width: 450px;">{{$product->relation_product->product_name}}</td>
                    <td>{{$product->quentity}} X</td>
                    <td>{{$product->relation_product->after_discount}}</td>

                    <td >{{$product->price*$product->quentity}}</td>
                </tr>
                @endforeach
                <tr class="item">
                    <td>Delevary Charge</td>
                    <td></td>
                    <td></td>
                    <td>{{$order->delivary_charge}}</td>
                </tr>
                <tr class="total">
                    <td></td>
                    <td></td>
                    <td></td>

                    <td>Total: {{ $order->total}} Tk</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
