<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function Index(Request $request){
        $pageTitle='Computer Point/Cart';
        $carts =  Cart::where('customer_id', Auth::guard('customer')->id())->orwhere('customer_id', $request->getClientIp())->get();
        return view('Frontend.cart',[
            'carts' => $carts,
            'pageTitle' => $pageTitle,
        ]);
    }

    function cart_insert(Request $request, $id) {
         $qnt = '';

        if ($request->has('quantity')) {
            $qnt = $request->quantity;
        } else {
            $qnt = 1;
        }
        // Check if a cart item with the same product_id exists
        if (Cart::where('product_id', $id)->where('customer_id', Auth::guard('customer')->id())->exists()) {
            $existingCartItem = Cart::where('product_id', $id)
            ->where('customer_id', Auth::guard('customer')->id())
            ->first();
            $existingCartItem->increment('quantity', $qnt);
        }
        else if (Cart::where('product_id', $id)->where('customer_id',$request->getClientIp())->exists()){
            $existingCartItem = Cart::where('product_id', $id)->where('customer_id',$request->getClientIp())->first();
            $existingCartItem->increment('quantity', $qnt);
        }

        else {
            // If no cart item with the same product_id exists, add a new item to the cart.
            $cartData = [
                'product_id' => $id,
                'quantity' => $qnt,
                'created_at' => Carbon::now(),
            ];

            // Check if a customer is authenticated using the "customer" guard
            if (Auth::guard('customer')->check()) {
                $cartData['customer_id'] = Auth::guard('customer')->id();
            } else {
                // If the customer is not authenticated, use the client's IP as the customer_id
                $cartData['customer_id'] = $request->getClientIp();
            }
            //  return $cartData;

            // Insert the new item into the Cart model/table
             Cart::create($cartData);
        }

        // Return a response indicating success

        return back()->with('success', 'Cart Added Successfully');
    }

    function cart_remove(Request $request){
         Cart::find($request->cart_id)->delete();
         return response()->json(['success' => 'Deleted Successfully!','tr'=> 'tr_'.$request->cart_id]);
    }
    function C_Coupne(Request $request){
        $copun_code= $request->coupon;
        $massage= null;
        $discount_type= null;
        $carts = Cart::where('customer_id', Auth::guard('customer')->id())->get();
        if($copun_code == ''){
             $discount = 0;
        }
        else{
            if(Coupon::where('coupon', $copun_code)->exists()){
                if(Carbon::now()->format('Y-m-d')> Coupon::where('coupon',$copun_code)->first()->validity){
                    $massage='This Coupon is Expaired';
                    $discount = 0;
                }
                else{
                   $discount= Coupon::where('coupon',$copun_code)->first()->discount;
                   $discount_type= Coupon::where('coupon',$copun_code)->first()->discount_type;
                }
            }
            else{
                $massage='This Coupon is Not Valide';
                $discount = 0;
            }
        }

                return view('frontend.cart',[
                    'carts'=>$carts,
                    'massage'=>$massage,
                    'discount'=>$discount,
                    'discount_type'=>$discount_type,
        ]);
    }
    function Update_cart(Request $request){
        foreach($request->quantity as $cart_id=>$quantity){
            $cart =  Cart::find($cart_id);
            if (Inventory::where('product_id', $cart->product_id)->first()->quantity >= $quantity) {
                 Cart::find($cart_id)->update([
                  'quantity'=>$quantity,
                ]);
            }
            elseif(Inventory::where('product_id', $cart->product_id)->first()->quantity <= $quantity){
                return  back()->with('error', $quantity." Quantuty Of Product Not Exists");
            }
            else {
                return back()->with('error', "Thouse Quantuty Of Product Not Exists");
            }
       }
       return back()->with('success', "Successfully Updated");
    }
}
