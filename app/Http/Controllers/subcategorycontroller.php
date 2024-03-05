<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\categoryadd;
use App\Models\sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class subcategorycontroller extends Controller
{
    function index(){
             $selectcat= categoryadd::all();
             $selectsubcat= sub_category::all();
            return  view('admin.subcategory.index', [
               'categoryes'=>$selectcat,
               'subcategory'=>$selectsubcat,
            ]);
    }
    function insertsub(Request $request){

        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
        ]);
        if(sub_category::where('category_id', $request->category_id)->where('subcategory_name',$request->subcategory_name)->exists()){
            return back()->with('exist','This Sub Category was tacken!');
        }
        else{
           sub_category::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Sub Category Added');
        }

    }
    function editsubcat($subcategory_id){
        $selectcat= categoryadd::all();
        $subcategory_info= sub_category::find($subcategory_id);
        return view('admin.subcategory.edit',
    [
        'categoryes'=>$selectcat,
        'subcategory_info'=>$subcategory_info,
    ]);
    }
    function update(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
        ]);
        if(sub_category::where('category_id', $request->category_id)->where('subcategory_name',$request->subcategory_name)->exists()){
            return back()->with('exist','This Category was tacken!');
        }
        else{
            sub_category::find($request->subcategory_id)->update([
                'category_id'=>$request->category_id,
                'subcategory_name'=>$request->subcategory_name,
                'updated_at'=>Carbon::now(),
        ]);
         return  redirect()->route('add.sub_catagory');
        }
       
       
    }
   
        function subcategory_herd_delete($subcategorydlt_id){
            sub_category::find($subcategorydlt_id)->delete();
            return back()->with('delete',"Deleted Succeccfully");
        }
    
}
