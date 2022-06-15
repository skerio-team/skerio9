<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Home\StoreHomeRequest;
use App\Http\Requests\Admin\Home\UpdateHomeRequest;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:home-list|home-create|home-edit|home-delete', ['only' => ['index','show']]);
         $this->middleware('permission:home-create', ['only' => ['create','store']]);
         $this->middleware('permission:home-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:home-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $items=Home::paginate(10);
        return view('admin.home.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeRequest $request)
    {
        $data=$request->all();

        if ($request->hasFile('image')) {
            $file=$request->image;
            $image_name=time().$file->getClientOriginalName();
            $file->move('admin/images/homes/', $image_name);
            $data['image']=$image_name;
        }

        $home=Home::create($data);

        return redirect()->route('admin.homes.index')->with('success', 'Ma`lumot yaratildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Home::whereId($id)->first();
        return view('admin.home.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Home::whereId($id)->first();
        return view('admin.home.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeRequest $request, $id)
    {
        $item=Home::find($id);
        $data=$request->all();
        if ($request->hasFile('image')) {
            $file=$request->image;
            $image_name=time().$file->getClientOriginalName();
            $file->move('admin/images/homes/', $image_name);
            $data['image']=$image_name;
        }

        $item->update($data);
        return redirect()->route('admin.homes.index')->with('success', 'Ma`lumot tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Home::destroy($id);
        return redirect()->route('admin.homes.index')->with('warning', "Ma`lumot o'chirildi!");
    }
}
