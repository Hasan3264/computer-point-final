<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\creear;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Careeraplication;
use Intervention\Image\Facades\Image;

class carrerController extends Controller
{
    function index(){
        return view('admin/career/index');
    }
    function InputCareer(Request $request){
        $request->validate([
          'job_details' => ['required'],
          'designation' => ['required'],
          'salary' => ['required'],
          'vacancy' => ['required'],
          'last_date' => ['required'],
        ]);
       creear::insert([
          'job_details' => $request->job_details,
          'designation' => $request->designation,
          'salary' => $request->salary,
          'vacancy' => $request->vacancy,
          'last_date' => $request->last_date,
          'created_at' => Carbon::now('Asia/Dhaka'),
       ]);
       return back()->with('success','Updated job details');
    }
    function UpdateCareer(Request $request){
       creear::find($request->editId)->update([
          'job_details' => $request->job_details,
          'designation' => $request->designation,
          'salary' => $request->salary,
          'vacancy' => $request->vacancy,
          'last_date' => $request->last_date,
          'created_at' => Carbon::now('Asia/Dhaka'),
       ]);
       return back()->with('success','Updated job details');
    }
    function Delete_career($id){
         creear::find($id)->delete();
         return back()->with('success','Successfully Deleted');
    }
    function Edit_career($id){
        $findId= creear::find($id);
        return view('admin.career.edit',[
            'findId' => $findId,
        ]);
    }

    function indexFrontend(){
        $pageTitle = 'ComputerPoint/Career';
        return view('Frontend.Career',[
            'pageTitle' => $pageTitle,
        ]);
    }
    function insertApplication(Request $request){
        $get_id = Careeraplication::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'cv' => 123,
            'Expected_salary' => $request->salary,
            'created_at' => Carbon::now(),
         ]);
         $uploaded_file = $request->file; // Assuming your file input name is 'cv'
         $extension = $uploaded_file->getClientOriginalExtension();
         $file_name = $request->name . '.' . $extension;

         // Move the uploaded file to the desired location
         $uploaded_file->move(public_path('/uploads/cv/'), $file_name);
         Careeraplication::find($get_id)->update([
             'cv' => $file_name,
         ]);
         return response()->json(['success' => 'Your Applications have been successfully Uploaded']);
    }
    function applicante_index(){
        $all = Careeraplication::all();
        return view('admin.career.applicante',[
            'all' => $all,
        ]);
    }
    function cv_download($id){
        $application = Careeraplication::findOrFail($id);
        $filePath = public_path('/uploads/cv/' . $application->cv);

        return response()->download($filePath);
    }
    function del_app($id){
        Careeraplication::findOrFail($id)->delete();
        return back()->with('success', 'Deleted successfully');
    }
}
