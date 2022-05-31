<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function storeRegion(Request $request)
    {
        $request->validate([
            'country_id'    =>  ['required', 'numeric'],
            'name'          =>  ['required', 'min:2', 'string'],
        ]);

        $data = $request->all();
        $regions = Region::create($data);
        
        return redirect()->route('admin.complexes.locations', compact('regions'));
    }
}
