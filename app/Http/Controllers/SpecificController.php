<?php

namespace App\Http\Controllers;

use App\Models\spacvalue;
use App\Models\specific;
use App\Models\specificscategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpecificController extends Controller
{
    function index(){
        $spec = specific::all();
        return view('admin.Specifac.specifac',[
            'specific' => $spec,
        ]);
    }




    function add_Spacific(Request $request){
        specific::insert([
            'name' => $request->name,
            'catid' => $request->catid,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Inserted Successfully');
    }

    function add_specValue(Request $request){
           spacvalue::insert([
               'spac' => $request->spec,
               'name' => $request->name,
               'created_at' => Carbon::now(),
           ]);
           return back()->with('success','Added Successfully');
    }

    function add_SpacCategory(Request $request){
           specificscategory::insert([
               'name' => $request->name,
               'created_at' => Carbon::now(),
           ]);
           return back()->with('success','Added Successfully');
    }
}
