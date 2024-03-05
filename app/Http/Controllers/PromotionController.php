<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Promotion;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
class PromotionController extends Controller
{
    function promotion(){
        $get_promotion = Promotion::all();
        return view('admin.quick.promotion.index',[
            'get_promotion'=>$get_promotion,
        ]);
    }
    function promotion_add(Request $request){
        $promotion = Promotion::insertGetId([
             'promotion_title'=>$request->promotion_title,
             'promotion_subtitle'=>$request->promotion_subtitle,
             'promotion_det'=>$request->promotion_det,
             'promotion_preview'=>'kl',
             'created_at'=>Carbon::now(),
        ]);
        $uploded_file= $request->promotion_preview;
        $extentaion= $uploded_file->getClientOriginalExtension();
        $file_name=$promotion.'.'.$extentaion;
         Image::make($uploded_file)->save(public_path('/uploads/promotion/'.$file_name));
         Promotion::find($promotion)->update([
        'promotion_preview'=>$file_name,
        ]);
         return back()->with('update','Updated done');
    }
    function promotion_status($promotion_id){
        $getstatus =Promotion::select('active_status')->where('id',$promotion_id)->first();
        if ($getstatus->active_status == 1) {
            $status = 0;
        } else {
           $status = 1;
        }
        Promotion::where('id',$promotion_id)->update([
            'active_status'=>$status,      
        ]);
        return back();
   }
}
