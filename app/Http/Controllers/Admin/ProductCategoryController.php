<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreProductCategoryRequest;
use App\Http\Requests\Admin\UpdateProductCategoryRequest;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
    {
         $this->middleware('permission:product_category-list|product_category-create|product_category-edit|product_category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product_category-create', ['only' => ['create','store']]);
         $this->middleware('permission:product_category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product_category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $items=ProductCategory::paginate(10);
        return view('admin.product_category.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {

        $data=$request->all();
        $data['slug']=\Str::slug($request->uz['name']);
        ProductCategory::create($data);
        return redirect()->route('admin.productCategories.index')->with('success', 'Mahsulot Kategoriyasi yaratildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=ProductCategory::whereId($id)->first();
        return redirect()->route('admin.productCategories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=ProductCategory::whereId($id)->first();
        return view('admin.product_category.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, $id)
    {
        $ProductCategory=ProductCategory::find($id);
        $data=$request->all();
        $data['slug']=\Str::slug($request->uz['name']);
        $ProductCategory->update($data);
        return redirect()->route('admin.productCategories.index')->with('success', 'Mahsulot Kategoriyasi tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::destroy($id);
        return redirect()->route('admin.productCategories.index')->with('warning', "Mahsulot Kategoriyasi o'chirildi!");
    }
}
