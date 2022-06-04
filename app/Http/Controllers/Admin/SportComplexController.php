<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSportComplexRequest;
use App\Http\Requests\Admin\UpdateSportComplexRequest;
use App\Models\Area;
use App\Models\SportCategory;
use App\Models\SportComplex;

class SportComplexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complexes  =   SportComplex::paginate(10);
        return view('admin.sport_complexes.index', compact('complexes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =   SportCategory::all();
        $areas      =   Area::all();

        return view('admin.sport_complexes.create', compact('categories', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSportComplexRequest $request)
    {
        $data = $request->all();
        // $complexes = new SportComplex;
        // $complexes->sport_category_id   =   $request->sport_category_id;
        // $complexes->area_id             =   $request->area_id;
        // $complexes->name                =   $request->name;
        if ($request->hasFile('image')) {
            $file=$request->image;
            $image_name=time().$file->getClientOriginalName();
            $file->move('admin/images/complexes/', $image_name);
            $data['image']   =   $image_name;
        }
        // $complexes->price               =   $request->price;
        // $complexes->phone               =   $request->phone;
        // $complexes->address             =   $request->address;
        // $complexes->location            =   $request->location;
        // $complexes->working_status      =   $request->working_status;
        // $complexes->dress_room          =   $request->dress_room;
        // $complexes->food                =   $request->food;
        // $complexes->bath_room           =   $request->bath_room;
        // $complexes->sit_place           =   $request->sit_place;
        // $complexes->meta_tag            =   $request->meta_tag;
        // $complexes->meta_title          =   $request->meta_title;
        // $complexes->meta_description    =   $request->meta_description;
        // $complexes->status              =   $request->status;
        $complexes = SportComplex::create($data);
        
        return redirect()->route('admin.complexes.table.index')->with('success', $complexes->name .'- successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=SportComplex::whereId($id)->first();
        
        return view('admin.sport_complexes.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complexes = SportComplex::whereId($id)->first();
        $categories = SportCategory::all();
        $areas = Area::all();

        return view('admin.sport_complexes.edit', compact('complexes', 'categories', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSportComplexRequest $request, $id)
    {
        $item = SportComplex::find($id);
        $data = $request->all();
        $item->update($data);

        return redirect()->route('admin.complexes.table.index')->with('success', $item->name .'- successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SportComplex $sportComplex)
    {
        $sportComplex->delete();

        return redirect()->route('admin.complexes.table.index')->with('success', $sportComplex->name .'- successfully deleted!');
    }
}
