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
        $images = array();
        if ($files = $request->file('image'))
        {
            foreach ($files as $file) {
                $name = time().$file->getClientOriginalName();
                $file->move('admin/images/complexes/', $name);
                $images[]   =   $name;
            }
        }
        $data['image'] = implode("|",$images);
        
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
    public function destroy($id)
    {
        SportComplex::destroy($id);

        return redirect()->route('admin.complexes.table.index')->with('success', 'Complex successfully deleted!');
    }
}