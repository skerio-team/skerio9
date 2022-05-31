<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function createCountry(Request $request)
    {
        $data = $request->validate([
            'name'  => ['required', 'min:2', 'string'],
        ]);

        $country = Country::create([
            'name'  =>  $data['name']
        ]);
        // $country = new Country;
        // $country->name = $data['name'];
        // $country->save();

        return redirect()->route('admin.complexes.locations')->with('success', 'Countries successfully created!');
    }
}
