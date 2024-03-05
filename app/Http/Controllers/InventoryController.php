<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\color;
use App\Models\Size;
use App\Models\product;
use App\Models\Inventory;
use Carbon\Carbon;
class InventoryController extends Controller
{
    function add_color(){
        $select_color= color::all();
        $select_size= Size::all();
        return view('.admin.inventory.color_size',[
            'colors'=> $select_color,
            'sizes'=> $select_size,
        ]);
    }
    function insert_color(Request $request){
       color::insert([
        'color_name'=>$request->color_name,
        'color_code'=>$request->color_code,
        'created_at'=>Carbon::now(),
       ]);
       return back()-> with('success', 'Color aded');
    }
    function insert_size(Request $request){
       Size::insert([
        'size_name'=>$request->size_name,
        'created_at'=>Carbon::now(),
       ]);
       return back()-> with('success', 'Success');
    }
    function inventory($product_id){
        $product_info= product::find($product_id);
        $color=color::all();
        $size=Size::all();
        $inventory=Inventory::where('product_id', $product_id)->get();
      return view('admin.inventory.inventory',[
          'product'=>$product_info,
              'color'=>$color,
              'size'=>$size,
              'inventory'=>$inventory,
      ]);
    }
    function insert_ventory(Request $request){
        if(Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()){
            Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->quantity);
            return back()-> with('success', 'Success');
        }
        else{
            Inventory::insert([
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
                'created_at'=>Carbon::now(),
            ]);
                return back()-> with('success', 'Success');
        }
    }
    function delete_color($color_id){
        color::find($color_id)->delete();
        return back()->with('deleted','Deletion successed');
    }
    function size_delete($size_id){
        Size::find($size_id)->delete();
        return back()->with('deleted','Deletion successed');
    }
}
