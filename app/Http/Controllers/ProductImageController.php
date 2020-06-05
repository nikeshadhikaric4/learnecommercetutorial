<?php

namespace App\Http\Controllers;

use App\models\Product;
use App\models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productImage=ProductImage::all();
        return view('website.backend.productimage.index', compact('productImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=Product::all();
        return view('website.backend.productimage.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slug=Str::slug($request->img_title,'-');

        $image = time().'.'.$request->img->extension();

        $request->img->move(public_path('images'), $image);


         ProductImage::create([
             'img_title'=>$request->img_title,
             'img'=>$image,
             'product_id'=>$request->product_id,


             'slug'=>$slug,

         ]);
         return redirect()->route('productImage.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        $product=Product::all();
        return view('website.backend.productimage.update',compact('productImage','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
        $slug=Str::slug($request->img_title,'-');
        if($request->img){
            $image = time().'.'.$request->img->extension();

            $request->img->move(public_path('images'), $image);

        }

        else{
            $image=$productImage->img;
        }



        $productImage->update([
             'img_title'=>$request->img_title,
             'img'=>$image,
             'product_id'=>$request->product_id,
             'slug'=>$slug,

         ]);
         return redirect()->route('productImage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();
        return redirect()->route('productImage.index');
    }
}
