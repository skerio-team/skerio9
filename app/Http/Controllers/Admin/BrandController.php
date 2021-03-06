<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\Admin\Brand\StoreBrandRequest;
use App\Http\Requests\Admin\Brand\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:brand-list|brand-create|brand-edit|brand-delete', ['only' => ['index','show']]);
         $this->middleware('permission:brand-create', ['only' => ['create','store']]);
         $this->middleware('permission:brand-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $items=Brand::paginate(10);
        return view('admin.brand.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $data=$request->all();

        if ($request->hasFile('image')) {
            $file=$request->image;
            $image_name=time().'_'.$file->getClientOriginalName();
            $file->move('admin/images/brands/', $image_name);
            $data['image']=$image_name;
        }

        $brand=Brand::create($data);

        return redirect()->route('admin.brands.index')->with('success', 'Ma`lumot yaratildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $item=Brand::whereId($id)->first();
        // return view('admin.brand.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Brand::whereId($id)->first();
        return view('admin.brand.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $item=Brand::find($id);
        $data=$request->all();
        if ($request->hasFile('image')) {
            $file=$request->image;
            $image_name=time().'_'.$file->getClientOriginalName();
            $file->move('admin/images/brands/', $image_name);
            $data['image']=$image_name;
        }

        $item->update($data);
        return redirect()->route('admin.brands.index')->with('success', $item->name . ' - ma`lumoti tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Brand::find($id);
        if ($model->image == null)
        {
            $model->delete();
        }
        else {
            $model->delete();
            $model->deleteImage();
        }
        
        return redirect()->route('admin.brands.index')->with('warning', $model->name . " - ma`lumoti o'chirildi!");
    }
}
