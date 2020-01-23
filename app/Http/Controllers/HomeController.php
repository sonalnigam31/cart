<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Coupon;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productList = Product::all();
        return view('home',['productList'  => $productList]);
    }
     /**
     * Show the application Cart dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart()
    {
        $couponList = Coupon::all();
        return view('cart',['couponList'  => $couponList]);
    }
    /**
     * Show the Add To Cart Functionality.
     *
     */

    public function addToCart(Request $request)
    {
    $product = Product::find($request->productid);
    $cart = Session::get('cart');
    $cart[$product->id] = array(
        "id" => $product->id,
        "name" => $product->name,
        "product_detail" => $product->product_detail,
        "price" => $product->price,
        "qty" => 1,
    );

    Session::put('cart', $cart);
    Session::flash('status','Product Added Successfully In Cart!');
    return count(Session::get('cart'));
    }

     /**
     * Show the UpdateCart Functionality.
     *
     */

public function updateCart(Request $cartdata)
{
    $cart = Session::get('cart');
   //echo "<pre>"; print_r($cartdata->all());
    foreach ($cartdata->all() as $id => $val) 
    {
        if ($val > 0) {
            if($id != 'example_length')
                $cart[$id]['qty'] = $val;
        } else {
            if($id != '_token')
              unset($cart[$id]);
        }
    }
    
    Session::put('cart', $cart);
    Session::flash('status','Cart Updated Successfully!');
    return redirect()->back();
}
 /**
     * Apply Coupon in Cart Products
     *
     */

    public function applycoupon(Request $request)
    {
        
            $couponCheck = Coupon::where('promocode', $request->coupon)->get();
            $cart = Session::get('cart');
            if(is_array($cart) && count($cart)>0)
            {
                $sum = 0;
                foreach($cart as $item)
                {
                   $sum = $sum + ($item['price']*$item['qty']);
                }
            }
            if(count($couponCheck)> 0)
            {
                $coupon = Coupon::where('promocode', $request->coupon)->first();
                if($coupon->amount >= $sum )
                {
                    echo "Out of range Coupon";
                }
                else
                {
                    $sum = $sum - $coupon->amount;
                    echo $sum;
                }
            }
            else
            {
                echo "Invalid Coupon";
            }
   // return count(Session::get('cart'));
        
    }

}
