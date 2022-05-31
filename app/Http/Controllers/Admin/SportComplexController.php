<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Country;
use App\Models\Region;
use App\Models\SportComplex;
use Illuminate\Http\Request;

class SportComplexController extends Controller
{

    public function locations()
    {
        return view('admin.sport_complexes.locations.index');
    }
    public function locationCreate()
    {
        return view('admin.sport_complexes.locations.create');
    }

    public function index()
    {
        return view('admin.sport_complexes.index');
    }

    public function create(Request $request)
    {
        return $request;
    }

    public function store(Request $request)
    {
        //
    }

    // public function storeCountry(Request $request)
    // {
    //     $request->validate([
    //         'name'  => ['required', 'min:2', 'string'],
    //     ]);

    //     $country = new Country;
    //     $country->name = $request->name;
    //     $country->save();

    //     return redirect()->route('admin.complexes.locations')->with('success', 'Countries successfully created!');
    // }

    // public function storeRegion(Request $request)
    // {
    //     $request->validate([
    //         'country_id'    =>  ['required', 'numeric'],
    //         'name'          =>  ['required', 'min:2', 'string'],
    //     ]);

    //     $region = new Region;
    //     $region->name   =   $request->name;
    //     $region->country_id =   $request->country_id;
    //     $region->save();
        
    //     return redirect()->route('admin.complexes.locations')->with('success', 'Regions successfully created!');
    // }

    // public function storeAria(Request $request)
    // {
    //     $request->validate([
    //         'region_id'     =>  ['required', 'numeric'],
    //         'name'          =>  ['required', 'min:2', 'string'],
    //     ]);

    //     $area = new Area;
    //     $area->name =   $request->name;
    //     $area->region_id    =   $request->region_id;
    //     $area->save();
        
    //     return redirect()->route('admin.complexes.locations')->with('success', 'Areas successfully created!');
    // }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
