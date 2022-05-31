<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'country_id'    =>  ['required', 'numeric'],
            'name'          =>  ['required', 'min:2', 'string'],
        ]);

        $region = new Region;
        $region->name   =   $request->name;
        $region->country_id =   $request->country_id;
        $region->save();
        
        return redirect()->route('admin.complexes.locations')->with('success', 'Regions successfully created!');
    }
}
