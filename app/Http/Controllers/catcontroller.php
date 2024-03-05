<?php

namespace App\Http\Controllers;
use App\Http\Requests\categoryrequest;
use Carbon\Carbon;
use App\Models\categoryadd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class catcontroller extends Controller
{
    function index(){
        $selectcat=categoryadd::all();
        $trash_cat=categoryadd::onlyTrashed()->get();
        return view('admin.category.index', [
          'selectcat'=>$selectcat,
          'trash_cat'=>$trash_cat,
        ]);
    }
    function insert(Request $request){
        $request->validate([
            'category_name'=>'required',
            'category_name'=>'unique:categoryadds',
        ]);
      categoryadd::insert([
          'user_id'=>Auth::id(),
          'category_name'=> $request->category_name,
          'created_at'=> Carbon::now(),
      ]);
      return back()->with('success','category Added Done');
    }
    function catagory_soft_delete($categorysoftdlt_id){
      categoryadd::find($categorysoftdlt_id)->delete();
      return back()->with('delete','Category deletion Done');
    }
    function catagory_edit($catagory_edit){
      $cat_info= categoryadd::find($catagory_edit);
      return view('admin.category.edit', compact('cat_info'));
    }
    function edit(Request $request){
     categoryadd::find($request->id)->update([
       'user_id'=>Auth::id(),
       'category_name'=>$request->category_name,
       'update_at'=>Carbon::now(),
     ]);
     return redirect()->route('add.catagory');
    }
   function restore($restore_id){
    categoryadd::onlyTrashed()->find($restore_id)->restore();
    return back();
   }
   function catagory_herd_delete($categorydlt_id){
    categoryadd::onlyTrashed()->find($categorydlt_id)->forceDelete();
    return back();
   }
   function mark_delete(Request $request){
      foreach($request->mark as $mark){
        categoryadd::find($mark)->delete();
      }
      return back()->with('alldelete','All Deleted');
   }
   function mark_restore(Request $request){
      foreach($request->mark as $mark){
        categoryadd::find($mark)->restore();
      }
      return back()->with('allrestore','All Restore');
   }

}
