<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Countries;
use App\Models\Districts;
use App\Models\Inventory;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Mail\SendInvoiceMail;
use App\Models\BillingDetails;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Mail;
class CheckOutController extends Controller
{
    function index(){
        $pageTitle='Computer Point/Cart';
        $Districts = Districts::orderBy('name', 'asc')->get();
        return view('Frontend.checkout',[
            'districts'=>$Districts,
            'pageTitle' => $pageTitle,
        ]);
    }

         function insert(Request $request){

            $request->validate([
                  'charge' => ['required'],
                  'payment_method' => ['required'],
                  'name' => ['required','string'],
                  'district' => ['required'],
                  'email' => ['required', 'email'],
                  'address'=>['required'],
                  'phone' => ['required', 'numeric']

            ]);

                   $order_id =  Order::insertGetId([
                        'user_id'=>$request->customer_id,
                        'subtotal'=>$request->sub_total,
                        'discount'=>$request->discount,
                        'delivary_charge'=>$request->charge,
                        'total'=>($request->sub_total+$request->charge)-$request->discount,
                        'delevary_type'=>$request->payment_method,
                        'order_gen_id' => rand(),
                        'created_at'=>Carbon::now('Asia/Dhaka'),
                    ]);

                    BillingDetails::insert([
                        'user_id'=>$request->customer_id,
                        'order_id'=>$order_id,
                        'name'=>$request->name,
                        'district_id'=>$request->district,
                        'upazila_id'=>$request->upazila,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        'address'=>$request->address,
                        'company'=>$request->company,
                        'notes'=>$request->notes,
                        'created_at'=>Carbon::now('Asia/Dhaka'),
                    ]);
                    //  Mail::to($request->email)->send(new SendInvoiceMail($order_id));
                    
                    $carts = Cart::where('customer_id', $request->customer_id)->get();
                    if ($carts->isNotEmpty()) {
                        $orderProduct = null;
                            foreach ($carts as $cart) {
                              $orderProduct =  OrderProduct::insert([
                                    'order_id'=>$order_id,
                                    'user_id'=>$request->customer_id,
                                    'product_id'=>$cart->product_id,
                                    'price'=>$cart ->relation_product->after_discount,
                                    'quentity'=>$cart ->quantity,
                                    'created_at'=>Carbon::now('Asia/Dhaka'),
                                ]);
                            }
                          
                            foreach($carts as $cart){
                                Inventory::where('product_id', $cart->product_id)->decrement('quantity', $cart->quantity);
                            }


                            foreach($carts as $cart){
                                Cart::find($cart->id)->delete();
                            }

                            if ($orderProduct) {
                                Mail::to($request->email)->send(new SendInvoiceMail($order_id));
                                $get_order = Order::where('id', $order_id)->first();
                                return view('Frontend.order_success', compact('get_order'));
                            }
                            else{
                                return redirect()->route('Front.index');
                            }

                    }
                    else{
                        // return $request->all;
                        $orderProduct =  OrderProduct::insert([
                            'order_id'=>$order_id,
                            'user_id'=>$request->customer_id,
                            'product_id'=>$request->product_id,
                            'price'=>$request->after_discount,
                            'quentity'=>1,
                            'created_at'=>Carbon::now('Asia/Dhaka'),
                        ]);
                        Mail::to($request->email)->send(new SendInvoiceMail($order_id));
                        Inventory::where('product_id', $request->prdouct_id)->decrement('quantity', 1);
                        $get_order = Order::where('id', $order_id)->first();
                        // $pageTitle = 'Order Successful';
                        return view('Frontend.order_success',[
                            'get_order' => $get_order,
                            'pageTitle' => 'Order Successful'
                        ]);
                    }

        }


        function  order_Cancel($id){
             Order::find($id)->update([
               'position' => 'Canceled',
             ]);
             return back();
        }


}
