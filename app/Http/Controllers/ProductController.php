<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest('id')->paginate(5);

        return view('all_page.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('all_page.product-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {

        $image_parh ='';

        if($request->hasFile('image')){
            $image_parh = $request->file('image')->store('products');
        }

        $product = Product::create([
            'name' => $request-> name,
            'description' => $request -> description,
            'image' => $image_parh,
            'barcode' => $request -> barcode,
            'price' => $request -> price,
            'status' => $request -> status,
        ]);

        if( ! $product){
            return redirect()->back()->with('error','Sorry, there a problem while creating product.');
        }
        return redirect()->route('products.index')->with('success', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('all_page.product-edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product -> name = $request -> name ;
        $product -> description = $request -> description ;
        $product -> barcode = $request -> barcode ;
        $product -> price = $request -> price ;
        $product -> status = $request -> status ;

        if($request->hasFile('image')){
            //delete old image
            if($product->image){
                Storage::delete($product->image);
            }
            //store new image
            $image_parh = $request -> file('image')->store('products');
            //save to database
            $product -> image = $image_parh;
        }

        if(! $product -> save()){
            return redirect()->back()->with('error','Sorry, there a problem while updating product.');
        }return redirect()->route('products.index')->with('success', 'success, your product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product,$id)
    {
        if($product->image){
            Storage::delete($product->image);
        }
        $pro = Product::find($id);
        
        $pro->delete();
        $product->delete();

        return response()->json([
            'success' => 200
        ]);
    }
}
