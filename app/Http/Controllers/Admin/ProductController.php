<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SportCategory;
use App\Models\ProductCategory;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Product::paginate(10);
        return view('admin.product.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=Product::all();
        $brands=Brand::all();
        $sizes=Size::all();
        $sport_categories=SportCategory::all();
        $product_categories=ProductCategory::all();
        // dd($product_categories);
        return view('admin.product.create', compact('items', 'sport_categories', 'product_categories', 'brands', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$request->all();
        if ($request->hasFile('image')) {
            $file=$request->image;
            $image_name=time().$file->getClientOriginalName();
            $file->move('admin/images/products/', $image_name);
            $data['image']=$image_name;
        }
        if($data['discount'] > "0"){
            $d=$data['discount'];
            $p=$data['price'];
            $p=$p-($p*$d/100);
            $p=$data['price'];
        }

        $product = Product::create($data);
        $product->sizes()->attach($request->size_id);

        return redirect()->route('admin.products.index')->with('success', 'Ma`lumot yaratildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Product::whereId($id)->first();
        //  dd($item->sport_categories);
        return view('admin.product.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Product::whereId($id)->first();
        $items=Product::all();
        $brands=Brand::all();
        $sizes=Size::all();
        $sport_categories=SportCategory::all();
        $product_categories=ProductCategory::all();
        return view('admin.product.edit',compact('item', 'items','sport_categories', 'product_categories', 'brands', 'sizes'));
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
        $item=Product::find($id);
        $data=$request->all();
        if ($request->hasFile('image')) {
            $file=$request->image;
            $image_name=time().$file->getClientOriginalName();
            $file->move('admin/images/products/', $image_name);
            $data['image']=$image_name;
        }
        $item->sizes()->sync($request->size_id);
        $item->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Ma`lumot tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::find($id);
        $item->sizes()->detach();
        Product::destroy($id);

        return redirect()->route('admin.products.index')->with('warning', "Ma`lumot o'chirildi!");
    }
}
