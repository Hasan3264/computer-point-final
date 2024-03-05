<?php

namespace App\Http\Controllers;

use App\Models\CustomerEmailVarificate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CustomerLogin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    function dashboard(){
        $orders=Order::where('user_id', Auth::guard('customerlogin')->id())->get();
             return view ('frontend.dashboard',[
                 'orders'=>$orders,
             ]);
    }
    function customerinp_update(Request $request){
        if($request->password== ''){
            CustomerLogin::find(Auth::guard('customer')->id())->update([
                'name'=>$request->name,
            ]);
            return back();
          }
          else{
                CustomerLogin::find(Auth::guard('customerlogin')->id())->update([
                    'name'=>$request->name,
                    'password'=>bcrypt($request->password),
                ]);
                return back();
          }
    }
    // function confirm_email_varify($token){
    //     $token_check =CustomerEmailVarificate::where('token', $token)->firstOrFail();
    //     $costomer = CustomerLogin::findOrFail($token_check->customer_id);
    //     $costomer->update([
    //         'email_varifaied_at'=>Carbon::now(),
    //     ]);
    //     $token_check->delete();
    //     return redirect()->route('customer.register');
    //  }
}
