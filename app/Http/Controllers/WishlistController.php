<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\product;
use App\Models\wishlist;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\CustomerLogin;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
   function wishlist_show(){
    $getwishs= Wishlist::where('customer_id', Auth::guard('customer')->id())->get();
    $pageTitle = 'Computer Point/Wishlist';
      return view('Frontend.wishlist',[
              'getwishs'=>$getwishs,
              'pageTitle' => $pageTitle
      ]);
   }



   function wishlist(Request $request) {
    if (!Auth::guard('customer')->check()) {
        return response()->json(['success' => false, 'message' => 'User not authenticated']);
    }

    $customerId = Auth::guard('customer')->id();
    $productId = $request->product_id;

    $product = Product::find($productId);

    if (!$product) {
        return response()->json(['success' => false, 'message' => 'Product not found']);
    }

    $wishlistExists = Wishlist::where('customer_id', $customerId)->where('product_id', $productId)->exists();

    if ($wishlistExists) {
        return response()->json(['success' => false, 'message' => 'Wishlist already exists']);
    }

    Wishlist::create([
        'customer_id' => $customerId,
        'product_id' => $productId,
        'created_at' => Carbon::now(),
    ]);

    $wishlistCount = Wishlist::where('customer_id', $customerId)->count();

    return response()->json([
        'success' => true,
        'message' => 'Product added to wishlist successfully',
        'count' => $wishlistCount
    ]);
}

function wishlist_addtoCart(Request $request){
    $qnt = 1;
    $aurtId = Auth::guard('customer')->id();
    $id = $request->Pro_id;
    if (Cart::where('product_id', $id)->where('customer_id', $aurtId)->exists()) {
        $existingCartItem = Cart::where('product_id', $id)
        ->where('customer_id', $aurtId)
        ->first();
        $existingCartItem->increment('quantity', $qnt);
    }
    else  {
        // If no cart item with the same product_id exists, add a new item to the cart.
        $cartData = [
            'product_id' => $id,
            'quantity' => $qnt,
            'customer_id'=> $aurtId,
            'created_at' => Carbon::now(),
        ];

        Cart::create($cartData);
    }
    Wishlist::find($request->wish_id)->delete();
    // Return a response indicating success
     $count = Cart::where('customer_id', $aurtId)->count();
    return response()->json([
        'success' => true,
        'message' => 'Add to cart successfully',
        'tr'=> 'tr_'.$request->wish_id,
        'count' => $count
    ]);
}

   function wishlist_delete($wishlist_id){
      wishlist::find($wishlist_id)->delete();
      return back()->with('deleted','Deletion successed');
   }
}
