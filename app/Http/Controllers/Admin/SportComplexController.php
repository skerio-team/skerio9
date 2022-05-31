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
