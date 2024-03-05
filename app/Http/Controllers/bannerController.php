<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class bannerController extends Controller
{
    function banner(){
        $get_banners =banner::all();
        return view('admin.banner.banner_add',[
            'get_banners'=>$get_banners,
        ]);
    }
    function banner_delete($id){
        $banner= banner::find($id);
        $delete_from=public_path('/uploads/banner/'.$banner->banner_preview);
         unlink($delete_from);

         banner::find($id)->delete();
        return back()->with('delete','Deletion done');
    }
    function banner_add(Request $request){
      $banner_id = banner::insertGetId([
            'banner_preview'=>'kol',
            'banner_link'=>$request->banner_link,
            'created_at'=>Carbon::now(),
        ]);
        $uploded_file= $request->banner_preview;
        $extentaion= $uploded_file->getClientOriginalExtension();
        $file_name=$banner_id.'.'.$extentaion;
        Image::make($uploded_file)->resize(900,500)->save(public_path('/uploads/banner/'.$file_name));
        banner::find($banner_id)->update([
         'banner_preview'=>$file_name,

    ]);
    return back()->with('update','Updated done');
    }
}
