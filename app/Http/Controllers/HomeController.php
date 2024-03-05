<?php

namespace App\Http\Controllers;

use App\Models\Clinte_massge;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\product;
use Carbon\Carbon;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today_sell = Order::whereDate('created_at', Carbon::today())->sum('total');
        $yesterday_sell = Order::whereDate('created_at', Carbon::Yesterday())->sum('total');
        $subday_sell = Order::where('created_at','>=', Carbon::today()->subDays(7))->sum('total');
        $month_sell = Order::where('created_at','>=', Carbon::today()->subDays(30))->sum('total');
        $top_sales = DB::table('products')
            ->leftJoin('order_products','products.id','=','order_products.product_id')
            ->selectRaw('products.id, SUM(order_products.quentity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->first();
        $user_name=Auth::user()->name;
        return view('home',[
            'user_name' =>$user_name,
            'today_sell' =>$today_sell,
            'yesterday_sell' =>$yesterday_sell,
            'subday_sell' =>$subday_sell,
            'month_sell' =>$month_sell,
            'top_sales' =>$top_sales,
        ]);
    }
    //users
     function users()
     {
        $select= User::where ('id', '!=', Auth::id())->paginate(2);
        $total_user= User::count();
         return view('admin.users.users', compact('select','total_user'));
     }
     function user_delete($user_id){
         user::find($user_id)->delete();
         return back()->with('dekete', 'User Was Deleted');
     }
     function desh(){
         return view('layouts.dashboard');
     }
     function usersdetails(){
         return view('admin.users.profile');
     }
     function updatename(Request $request){
        $request->validate([
           'name'=>'required',
        ]);
        user::find(Auth::id())->update([
            'name'=>$request->name,
            'updated_at'=>Carbon::now(),
          ]);
          return back()->with('Updated','Updated Name');
         }
     function update_pass(Request $request){
         $request->validate([
             'old_password'=>'required',
             'password'=>'required',
             'password'=>Password::min(8)
                        ->letters()
                        ->numbers(),
             'password'=>'confirmed',
         ]);
         if(\Hash::check($request->old_password, Auth::user()->password)){
            if(\Hash::check($request->password, Auth::user()->password)){
                return back()->with('exiest_pass','Password was tacken for This Gmail!');
            }
            else{
                User::find(Auth::id())->update([
                   'password'=>bcrypt($request->password),
                   'updated_at'=>Carbon::now(),
                ]);
                return back()->with('updated_pass','Password hasbeen changed!');
            }
         }
         else{
               return back()->with('wrong_pass','Old Password not correct!');
         }

    }
     function photo_update(Request $request){
         $request->validate([
          'profile_photo'=>'image',
          'profile_photo'=>'file|max:2056',
         ]);
             $upload_photo=$request->profile_photo;
             $extension=$upload_photo->getClientOriginalExtension();
             $file_name=Auth::id().'.'.$extension;
            if(Auth::user()->profile_photo=='default.png'){
                Image::make($upload_photo)->save(public_path('/uploads/users/'.$file_name));
                User::find(Auth::id())->update([
                    'profile_photo'=>$file_name,
                ]);
                return back()->with('update_photo','Photo Updated');
            }
            else{
                $delete_from=public_path('/uploads/users/'.Auth::user()->profile_photo);
                unlink($delete_from);
                Image::make($upload_photo)->save(public_path('/uploads/users/'.$file_name));
                User::find(Auth::id())->update([
                    'profile_photo'=>$file_name,
                ]);
                return back()->with('update_photo','Photo Updated');
            }
     }


}
