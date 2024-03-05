<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Brands;
use App\Models\product;
use App\Models\thumbnails;
use App\Models\categoryadd;
use Illuminate\Support\Str;
// use Image;
use App\Models\sub_category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    function index(){
        $selectcat= categoryadd::all();
        $selectsubcat= sub_category::all();
        $brands= Brands::all();
        return view('admin.product.index',[
            'categoryes'=>$selectcat,
            'subcategory'=>$selectsubcat,
            'brands'=>$brands,
         ]);
    }


    function getsubcategory(Request $request){
       $sub_categories=  sub_category::where('category_id', $request->category_id)->get();
       $str='<option value="">----- Select Sub Category -----</option>';
       foreach($sub_categories as $sub_category){
           $str .='<option value="'.$sub_category->id.'">'.$sub_category->subcategory_name.'</option>';
       }
      echo $str;
    }
    function insert(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_name' => 'required',
            'brands' => 'required',
            'product_price' => 'required|numeric',
            'discount' => 'required|numeric',
            'short_des' => 'required',
            'long_des' => 'required',
            'Product_preview' => 'required|mimes:jpeg,jpg,png,webp,tiff,eps',
            'thumbnails' => 'required|array',
            'thumbnails.*' => 'required|mimes:jpeg,jpg,png,webp,tiff,eps',
        ]);

        $product_id=product::insertGetId([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'brands'=>$request->brands,
            // 'slug'=>str_replace(' ', '-', strtolower($request->product_name)),
            'slug'=>Str::slug($request->product_name),
            'product_price'=>$request->product_price,
            'discount'=>$request->discount,
            'after_discount'=>$request->product_price - $request->discount,
            'short_des'=>$request->short_des,
            'long_des'=>$request->long_des,
            'created_at'=>Carbon::now(),
         ]);
                    $uploaded_file= $request->Product_preview;
                    $extension= 'webp';
                    $file_name=Str::slug($request->product_name).'.'.$extension;
                    Image::make($uploaded_file)->encode('webp')->save(public_path('/uploads/product/preview/'.$file_name));

                    product::find($product_id)->update([
                    'Product_preview'=>$file_name,

                    ]);
                        $loop = 1;
                        $thumbnail_Image=$request->thumbnails;
                        foreach($thumbnail_Image as $thumb){
                            $extension_thumbnails = 'webp';
                            $thumbnail_name=Str::slug($request->product_name).'-'.$loop.'.'.$extension_thumbnails;
                            Image::make($thumb)->encode('webp')->save(public_path('/uploads/product/thumbnails/'.$thumbnail_name));

                                        thumbnails::insert([
                                            'product_id'=>$product_id,
                                            'thumbnail'=>$thumbnail_name,
                                            'created_at'=>Carbon::now(),
                                        ]);

                            $loop++;

                        }

         return back()->with('success','Updated done');
     }

            function get_product(){
                $all_product = product::all();
                return view('admin.product.product_list',[
                    'all_product'=> $all_product,
                ]);
            }
            function product_delete($product_id){
                $product_image= product::find($product_id);
                $delete_from=public_path('/uploads/product/preview/'.$product_image->Product_preview);
                unlink($delete_from);
                $prev_img= thumbnails::where('product_id',$product_id)->get();
                foreach ($prev_img as $thumprev_img) {
                    $delete_fromm=public_path('/uploads/product/thumbnails/'.$thumprev_img->thumbnail);
                     unlink($delete_fromm);
                  }
                  thumbnails::where('product_id',$product_id)->delete();
                  product::find($product_id)->delete();
                return back()->with('deleted','Deletion Succeed');
            }
            function edit_product_page($product_id){
                $selectcat= categoryadd::all();
                $sub_categoryes= sub_category::all();
                $product_info= product::find($product_id);
                $brands= Brands::all();
                return view('admin.product.edit',[
                    'selectcat'=>$selectcat,
                    'sub_categoryes'=>$sub_categoryes,
                    'brands'=>$brands,
                    'product_info'=>$product_info,
                ]);
            }
            
          function edit_product(Request $request){
              if($request->Product_preview != '' && $request->thumbnails != ''){
                      $request->validate([
                  'Product_preview' => 'required|mimes:jpeg,jpg,png,webp,tiff,eps',
                     'thumbnails' => 'required|array',
                    'thumbnails.*' => 'required|mimes:jpeg,jpg,png,webp,tiff,eps',
                  ]);
                     product::find($request->product_id)->update([
                    'category_id'=>$request->category_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'product_name'=>$request->product_name,
                    'brands'=>$request->brands,
                    'slug'=>Str::slug($request->product_name),
                    'product_price'=>$request->product_price,
                    'discount'=>$request->discount,
                    'after_discount'=>$request->product_price - $request->discount,
                    'short_des'=>$request->short_des,
                    'long_des'=>$request->long_des,
                    'updated_at'=>Carbon::now(),
               ]);

               $product_id = $request->product_id;
               $product_image= product::find($product_id);

               $delete_from=public_path('/uploads/product/preview/'.$product_image->Product_preview);
                unlink($delete_from);
               $uploaded_file= $request->Product_preview;
                            $extension= 'webp';
                            $file_name=Str::slug($request->product_name).'.'.$extension;
                            Image::make($uploaded_file)->encode('webp')->save(public_path('/uploads/product/preview/'.$file_name));
                            product::find($product_id)->update([
                                'Product_preview'=>$file_name,
               ]);

                        $thumbnail_Image=$request->thumbnails;

                        if ($thumbnail_Image != '') {

                            $prev_img= thumbnails::where('product_id',$product_id)->get();
                              foreach ($prev_img as $thumprev_img) {
                                  $delete_from=public_path('/uploads/product/thumbnails/'.$thumprev_img->thumbnail);
                                  unlink($delete_from);
                                }
                                thumbnails::where('product_id',$product_id)->delete();

                          $loop=1;
                            foreach($thumbnail_Image as $thumb){
                            $extension_thumbnails = 'webp';
                            $thumbnail_name=$request->product_id.'-'.$loop.'.'.$extension_thumbnails;
                            Image::make($thumb)->encode('webp')->save(public_path('/uploads/product/thumbnails/'.$thumbnail_name));

                                        thumbnails::insert([
                                            'product_id'=>$request->product_id,
                                            'thumbnail'=>$thumbnail_name,
                                            'updated_at'=>Carbon::now(),
                                        ]);

                            $loop++;

                            }
                        }
                        else{

                        }
              }
            else{
                 product::find($request->product_id)->update([
                    'category_id'=>$request->category_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'product_name'=>$request->product_name,
                    'brands'=>$request->brands,
                    'slug'=>Str::slug($request->product_name),
                    'product_price'=>$request->product_price,
                    'discount'=>$request->discount,
                    'after_discount'=>$request->product_price - $request->discount,
                    'short_des'=>$request->short_des,
                    'long_des'=>$request->long_des,
                    'updated_at'=>Carbon::now(),
               ]);
            }
                return back()->with('success','Updated done');
        }

}
