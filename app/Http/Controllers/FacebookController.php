<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerLogin;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\support\Facades\Auth;
use Carbon\Carbon;

class FacebookController extends Controller
{
    function redirectToProvider(){
        return Socialite::driver('facebook')->redirect();
    }
    function handleToProviderCalback(){
        $user = Socialite::driver('facebook')->user();
        if(CustomerLogin::where('email', $user->getEmail())->exists()){
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
