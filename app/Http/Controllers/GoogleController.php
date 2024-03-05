<?php

namespace App\Http\Controllers;

use Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CustomerLogin;
use Illuminate\support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }
    function handleToProviderCalback(){
        $user = Socialite::driver('google')->user();
        if(Customer::where('email', $user->getEmail())->exists()){
             if(Auth::guard('customerlogin')->attempt(['email'=>$user->getEmail(),'password'=>'123@abc'])) {
                return redirect('/');
             }
        }
         else{
            CustomerLogin::insert([
                'name'=> $user->getName(),
                'email'=> $user->getEmail(),
                'password'=> bcrypt('123@abc'),
                'created_at'=>Carbon::now(),
            ]);
            if(Auth::guard('customerlogin')->attempt(['email'=>$user->getEmail(),'password'=>'123@abc'])) {
                return redirect('/');
             }
         }

    }
}
