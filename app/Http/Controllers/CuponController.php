<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Clinte_massge;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
class CuponController extends Controller
{
    function index(){
        $couponall = Coupon::all();
        return view('admin.coupon.index',[
            'couponall'=>$couponall,
        ]);
    }
    function insert(Request $request){
        Coupon::insert([
          'coupon'=>$request->coupon,
          'discount'=>$request->discount,
          'discount_type'=>$request->discount_type,
          'validity'=>$request->validity,
          'created_at'=>Carbon::now(),
        ]);
        return back()->with('succes', 'Coupon Added');
    }
    // function getall(Request $request){
    //    $couponall = Coupon::all();
    //     return back();
    // }
    function brand_index(){
        $brands = Brands::all();
        return view('admin.brands.add',[
            'brands' => $brands
        ]);
    }
    function Brandsinput(Request $request){
        $request->validate([
          'name' => ['required'],
        ]);
        Brands::insert([
          'name' => $request->name,
        ]);
        return back()->with('success', 'Coupon Added');
    }
    function massage_index(){
        $allMessages = Clinte_massge::orderBy('id', 'desc')->get();
        return view('admin.clintMassage.clintMassage',[
         'all' => $allMessages,
        ]);
    }
    function del_massage($id){
        Clinte_massge::find($id)->delete();
        return back();
    }
}
