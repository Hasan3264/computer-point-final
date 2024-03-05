<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Mail\SendInvoiceMail;
use App\Models\Cart;
use App\Models\Countries;
use App\Models\Upazilas;
use App\Models\Inventory;
use App\Models\Districts;
use App\Models\Order;
use App\Models\BillingDetails;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Session;
use Stripe;



class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe()

    {

        return view('stripe');

    }



    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $data =session('data');
        Stripe\Charge::create ([

                "amount" => 100 * $data['sub']+$data['charge'],

                "currency" => "bdt",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com."

        ]);

        $order_id =  Order::insertGetId([
            'user_id'=>Auth::guard('customerlogin')->id(),
            'subtotal'=>$data['sub_total'],
            'discount'=>$data ['discount'],
            'delivary_charge'=>$data['charge'],
            'total'=>$data['sub']+$data['charge'],
            'delevary_type'=>'stripe',
            'created_at'=>Carbon::now(),
        ]);

        BillingDetails::insert([
            'user_id'=>Auth::guard('customerlogin')->id(),
            'order_id'=>$order_id,
            'name'=>$data['name'],
            'district_id'=>$data['district'],
            'upazila_id'=>$data['upazila'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'company'=>$data['company'],
            'notes'=>$data['notes'],
            'created_at'=>Carbon::now(),
        ]);

        $carts = Cart::where('customer_id', Auth::guard('customerlogin')->id())->get();
        foreach ($carts as $cart) {
            OrderProduct::insert([
                'order_id'=>$order_id,
                 'user_id'=>Auth::guard('customerlogin')->id(),
                'product_id'=>$cart->product_id,
                'price'=>$cart ->relation_product->after_discount,
                'quentity'=>$cart ->quantity,
                'created_at'=>Carbon::now(),
            ]);

        }
        $totqal_amount=$data['sub_total']+$data['charge'] - ($data['discount']);
        Mail::to($data['email'])->send(new SendInvoiceMail($order_id));
           // BALK sms

                    $url = "http://66.45.237.70/api.php";
                    $number=$data['phone'];
                    $text="Your order plased, You have to paid".$totqal_amount;
                    $data= array(
                    'username'=>"01859554623",
                    'password'=>"CKXF64GZ",
                    'number'=>"$number",
                    'message'=>"$text"
                    );
                    $ch = curl_init(); // Initialize cURL
                    curl_setopt($ch, CURLOPT_URL,$url);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $smsresult = curl_exec($ch);
                    $p = explode("|",$smsresult);
                    $sendstatus = $p[0];
       //balk sms
        foreach($carts as $cart){
            Inventory::where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->decrement('quantity', $cart->quantity);
            Cart::find($cart->id)->delete();
        }


         return redirect()->route('order.success')->with('order_done','Your order was plased');
    }
}






