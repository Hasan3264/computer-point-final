<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CustomerLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CostomerLoginController extends Controller
{
    //register part
    public function CustomerInput(Request $request){
        $request->validate([
            'username'=> ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . CustomerLogin::class],
            'password' => ['required', 'min:8'],
        ]);
        $user = CustomerLogin::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at'=>Carbon::now(),

        ]);
        Auth::guard('customer')->login($user);

        return back()->with('success','Account Created Successfully');
    }
    //login success


    //logout
    public function Logout(){
        Auth::guard('customer')->logout();
        return redirect()->route('Front.index');
    }
    //register part end
    //login part start
    public function LogIN(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            // Authentication passed, redirect to a success page
            return back()->with('success','Login Success');
        }
      return back()->with('error','Login Faild');
    }
    //login part end
    //profile part start
     public function Profile(){
        $pageTitle = 'Computer Point/Profile';
        return view('Frontend.Profile',[
            'pageTitle' => $pageTitle,
        ]);
     }

     public function Update_Customer(Request $request){
        $UpdateUser = [
            'updated_at' => Carbon::now(),
        ];

        if($request->has('name')){
            $UpdateUser['name'] = $request->name;

        }
        if($request->has('address')){
            $UpdateUser['address'] = $request->address;
        }
        if($request->has('password')){
            $this->validate($request, [
                'old_password'=> 'required',
                'password' => 'min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6'
            ]);

            $oldPassword = $request->old_password;
            $hashOldPass = Auth::guard('customer')->user()->password;

            if (Hash::check($oldPassword, $hashOldPass)) {
                $UpdateUser['password'] = Hash::make($request->password);
            } else {
                return back()->with('OldError', 'Old Password is Incorrect');
            }
        }

        // Assuming you have a logged-in customer and can access their instance
        $customer = Auth::guard('customer')->user();
        CustomerLogin::find($customer->id)->update($UpdateUser);
        return back()->with('success', 'User Updated Successfully');
        // Redirect to the customer profile or dashboard page
    }



}
