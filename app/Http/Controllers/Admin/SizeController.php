<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;


class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:size-list|size-create|size-edit|size-delete', ['only' => ['index','show']]);
         $this->middleware('permission:size-create', ['only' => ['create','store']]);
         $this->middleware('permission:size-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:size-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $items=Size::paginate(10);
        return view('admin.sizes.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sizes.create');
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
        Size::create($data);
        return redirect()->route('admin.sizes.index')->with('success', 'O`lcham Kategoriyasi yaratildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Size::whereId($id)->first();
        return redirect()->route('admin.sizes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Size::whereId($id)->first();
        return view('admin.sizes.edit',compact('item'));
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
        $Size=Size::find($id);
        $data=$request->all();
        $Size->update($data);
        return redirect()->route('admin.sizes.index')->with('success', 'O`lcham Kategoriyasi tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Size::destroy($id);
        return redirect()->route('admin.sizes.index')->with('warning', "O`lcham Kategoriyasi o'chirildi!");
    }
}
