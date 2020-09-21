<?php

namespace App\Http\Controllers;

use App\Cart;
use App\models\CustomerDetail;
use App\models\Payment;
use App\models\Product;
use App\models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productImage=ProductImage::paginate(3);
        $popular=ProductImage::paginate(6);
        return view('website.frontend.layouts.main', compact('productImage','popular'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function addToCart(Request $request, $id){
         $product=Product::find($id);
         $oldCart =Session::has('cart') ? Session::get('cart') : null;

         $cart=new Cart($oldCart);
         $cart->add($product,$product->id);

         $request->session()->put('cart', $cart);

        //  dd($request->session()->get('cart'));
         return redirect()->route('website.index');

     }

     public function getCart(){
         if(!Session::has('cart')){
             return view('website.frontend.shop.shopping-cart',['products'=>null]);
         }
         $oldCart=Session::get('cart');
         $cart=new Cart($oldCart);
        //  $products=$cart->items;
        //  $totalPrice=$cart->totalPrice;
        //  return view('website.frontend.shop.shopping-cart',compact('products','totalPrice'));



         return view('website.frontend.shop.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
     }

     public function getCheckout(){
        if(!Session::has('cart')){
            return view('website.frontend.shop.shopping-cart',['products'=>null]);
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view('website.frontend.shop.checkout',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function storeOrder(Request $request){
        CustomerDetail::create([
            'f_name'=>$request->f_name,
            'l_name'=>$request->f_name,
            'company_name'=>$request->company_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'country'=>$request->country,
            'address1'=>$request->address1,
            'address2'=>$request->address2,
            'town'=>$request->town,
            'district'=>$request->district,
            'post_code'=>$request->post_code,
            'other_notes'=>$request->other_notes

        ]);

        $customerDetail=CustomerDetail::orderBy('created_at')->first();
        $custId=$customerDetail->id;

        Payment::create(['total'=>$request->totalPrice,
        'payment_type'=>$request->payment_type,
        'customer_id'=>$custId,
        'status'=>'active']);
        $request->session()->flush();


        return redirect()->route('website.index');





    }





    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
