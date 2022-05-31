<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function storeCountry(Request $request)
    {
        $request->validate([
            'name'  => ['required', 'min:2', 'string'],
        ]);

        // $data = $request->all();
        $country = new Country;
        $country->name = $request->name;
        $country->save();

        return redirect()->route('admin.complexes.locations', compact('counties'))->with('success', 'Countries successfully created!');
    }
}
