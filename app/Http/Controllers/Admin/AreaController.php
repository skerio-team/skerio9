<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'region_id'     =>  ['required', 'numeric'],
            'name'          =>  ['required', 'min:2', 'string'],
        ]);

        $area = new Area;
        $area->name =   $data['name'];
        $area->region_id    =   $data['region_id'];
        $area->save();
        
        return redirect()->route('admin.complexes.locations')->with('success', 'Areas successfully created!');
    }
}
