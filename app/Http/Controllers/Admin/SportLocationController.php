<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSportComplexRequest;
use App\Http\Requests\Admin\UpdateSportComplexRequest;
use App\Models\Area;
use App\Models\Country;
use App\Models\Region;
use App\Models\SportComplex;

class SportLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # use default 'page' for this
        
        $countries = Country::paginate(5, ['*'], 'countries');

        # use custom 'other_page' for this
        // $collection2 = Region::paginate(5);
        $countries->setPageName('countries');
        

        //$countries  =   Country::orderBy('country', 'asc')->get();
        $regions    =   Region::paginate(5, ['*'], 'regions');
        $regions->setPageName('regions');
        $areas      =   Area::all();
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
