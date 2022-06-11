<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSportComplexRequest;
use App\Http\Requests\Admin\UpdateSportComplexRequest;
use App\Models\Area;
use App\Models\Country;
use App\Models\Region;
use App\Models\SportComplex;
use Illuminate\Support\Facades\Request;

class SportLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $countries = Country::orderBy('country', 'asc')->paginate(10, ['*'], 'countries');
        $countries->setPageName('countries');
        $regions    =   Region::paginate(10, ['*'], 'regions');
        $regions->setPageName('regions');
        $areas      =   Area::paginate(10, ['*'], 'areas');
        $areas->setPageName('areas');
        return view('admin.sport_complexes.locations.index', compact('countries', 'regions', 'areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSportComplexRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
