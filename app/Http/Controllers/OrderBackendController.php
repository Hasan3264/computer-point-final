<?php

namespace App\Http\Controllers;

use App\Models\BillingDetails;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderProduct;

class OrderBackendController extends Controller
{
    function order(){
        $orders = Order::latest()->get();
        return view('admin.order.index',[
            'orders'=>$orders,
        ]);
    }
    function order_position($order_id){
       $OrderProduct = OrderProduct::Where('order_id',$order_id)->get();
       $BillingDetails = BillingDetails::Where('order_id',$order_id)->get();
       $Order = Order::find($order_id);
        return view('admin.order.order_position',[
            'OrderProduct'=>$OrderProduct,
            'BillingDetails'=>$BillingDetails,
            'Order'=>$Order,
        ]);
    }
    function order_Delete(Request $request){
        OrderProduct::where('order_id',$request->order_id)->delete();
        BillingDetails::where('order_id',$request->order_id)->delete();
        Order::find($request->order_id)->delete();
         return response()->json(['success' => 'Deleted Successfully!','tr'=> 'tr_'.$request->order_id]);
    }
    function Product_delete(Request $request){
        OrderProduct::find($request->del_id)->delete();
         return response()->json(['success' => 'Deleted Successfully!','tr'=> 'tr_'.$request->del_id]);
    }
    function Update_Position(Request $request){
        Order::find($request->edit_id)->update([
          'position' => $request->position,
        ]);
        return back()->with('success', 'Position updated successfully');
    }
    function order_Update(Request $request){
          $request->validate([
           'subtotal' => ['integer','required'],
           'delivary_charge' => ['integer','required'],
           'total' => ['integer','required'],
          ]);
          Order::find($request->order_id)->update([
                   'subtotal' => $request->subtotal,
                   'delivary_charge' => $request->delivary_charge,
                   'total' => $request->total,
          ]);
          return back()->with('success', 'Updated successfully');
    }
    function Quantity_Update(Request $request){
         foreach($request->quentity as $edit_id=>$quentity){
            OrderProduct::find($edit_id)->update([
               'quentity' => $quentity,
            ]);
         }
         return back()->with('success', 'Updated successfully');
    }
}
