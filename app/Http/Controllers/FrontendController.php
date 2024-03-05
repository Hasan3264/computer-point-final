<?php

namespace App\Http\Controllers;

// use Arr;
// use Cookie;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\product;
use App\Models\categoryadd;
use Illuminate\Support\Arr;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\Clinte_massge;
use Flasher\Laravel\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class FrontendController extends Controller
{
    public function index(Request $request){
        Cart::where('created_at', '<', Carbon::now()->yesterday())->delete();
        $get_recent = json_decode(Cookie::get('recent_view'), true);
        if($get_recent == null){
            $get_recent = [];
            $after_unique = array_unique($get_recent);
        }
        else{
            $after_unique = array_unique($get_recent);
        }
        $all_recent_product = Product::find($after_unique);
        $pageTitle='Computer Point';
        return view('Frontend.index',[
            'all_recent_product'=>$all_recent_product,
            'pageTitle' =>$pageTitle,
        ]);
    }


    public function ContuctUsPage(){
        $pageTitle='ComputerPoint/Contuct Us';
        return view('Frontend.contuctus',[
            'pageTitle' =>$pageTitle,
        ]);
    }



    public function ProductDetails($slug){
        $findId = product::where('slug',$slug)->first();


        $total_reviews = OrderProduct::where('product_id',$findId->id)->whereNotNull('review')->count();
        $total_star = OrderProduct::where('product_id', $findId->id)->whereNotNull('review')->sum('star');
        $pageTitle=$findId->slug;
        $al = Cookie::get('recent_view');
       if(!$al){
           $al = "[]";
       }
       $all_info = json_decode($al, true);
       $all_info = Arr::prepend($all_info, $findId->id);
       $recent_product_id = json_encode($all_info);
       Cookie::queue('recent_view', $recent_product_id, 1000);
       return view('Frontend.pDetails',[
        'findId' => $findId,
        'pageTitle' => $pageTitle,
        'totalReviews'=>$total_reviews,
        'total_star' => $total_star,
     ]);
    }




    public function Shop(Request $request){
        // Retrieve previous search criteria from session
        $previousSearch = session('shop_search', []);

        $data = $request->all();

        $get_all_product = product::where(function($q) use($data){
            if(!empty($data['q']) && $data['q'] != '' && $data['q'] != 'undefined'){
                $q->where(function ($q) use ($data){
                    $q->where('product_name', 'like','%'.$data['q'].'%');
                    $q->orWhere('short_des', 'like','%'.$data['q'].'%');
                    $q->orWhere('after_discount', 'like','%'.$data['q'].'%');
                });
            }

            if(!empty($data['category_id']) && $data['category_id'] != '' && $data['category_id'] != 'undefined'){
                $q->where('category_id', $data['category_id']);
            }
            if(!empty($data['subcategory_id']) && $data['subcategory_id'] != '' && $data['subcategory_id'] != 'undefined'){
                $q->where('subcategory_id', $data['subcategory_id']);
            }
            if(!empty($data['min']) || !empty($data['max'])){
                $q->whereBetween('after_discount', [$data['min'], $data['max']]);
            }
        })->paginate(40);

        // Store the current search criteria in the session
        session(['shop_search' => $data]);

        $pageTitle = 'Computer Point/Shop';

        return view('Frontend.shop', [
            'product' => $get_all_product,
            'pageTitle' => $pageTitle,
            'previousSearch' => $previousSearch, // Pass the previous search data to the view
        ]);
    }






    function Contuct_Insert(Request $request){
        // return $request;
        Clinte_massge::insert([
          'name' => $request->name,
          'email' => $request->email,
          'subject' => $request->subject,
          'massge' => $request->message,
        ]);

        return response()->json(['success' => 'Form submitted successfully']);
    }

    function About_us(){
        $pageTitle='Computer Point/AboutUs';
        return view('Frontend.Aboutus',[
            'pageTitle' => $pageTitle,
        ]);
    }
    function Policy(){
        $pageTitle='Computer Point/Policy';
        return view('Frontend.Policy',[
            'pageTitle' => $pageTitle,
        ]);
    }



    function review(Request $request){
        $sfd  = OrderProduct::where('user_id', Auth::guard('customer')->id())->where('product_id', $request->product_id)->first();
       $sfd->update([
            'review'=>$request->review,
            'star'=>$request->star,
        ]);
         return Response()->json(['success','Thank You for Review Our Product']);
     }
}

