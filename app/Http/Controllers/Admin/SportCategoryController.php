<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;
use Illuminate\Http\Request;

class SportCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:sport_category-list|sport_category-create|sport_category-edit|sport_category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:sport_category-create', ['only' => ['create','store']]);
         $this->middleware('permission:sport_category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sport_category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $items=SportCategory::paginate(10);
        return view('admin.sport_category.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sport_category.create');
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
        $data['slug']=\Str::slug($request->uz['name']);


        SportCategory::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Sport Kategoriyasi yaratildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=SportCategory::whereId($id)->first();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=SportCategory::whereId($id)->first();
        return view('admin.sport_category.edit',compact('item'));
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
        $SportCategory=SportCategory::find($id);
        $data=$request->all();
        $data['slug']=\Str::slug($request->uz['name']);
        $SportCategory->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Sport Kategoriyasi tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SportCategory::destroy($id);
        return redirect()->route('admin.categories.index')->with('warning', "Sport Kategoriyasi o'chirildi!");
    }
}
