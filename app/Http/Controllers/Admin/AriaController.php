<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AriaController extends Controller
{
    public function storeAria(Request $request)
    {
        $request->validate([
            'region_id'     =>  ['required', 'numeric'],
            'name'          =>  ['required', 'min:2', 'string'],
        ]);

        $data = $request->all();
        $area = Area::create($data);
        
        return redirect()->route('admin.complexes.locations', compact('areas'));
    }
}
