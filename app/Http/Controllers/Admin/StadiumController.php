<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stadium\StoreStadiumRequest;
use App\Http\Requests\Admin\Stadium\UpdateStadiumRequest;
use App\Models\Stadium;
use App\Models\StadiumSection;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:stadium-list|stadium-create|stadium-edit|stadium-delete', ['only' => ['index','show']]);
         $this->middleware('permission:stadium-create', ['only' => ['create','store']]);
         $this->middleware('permission:stadium-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:stadium-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $stadiums = Stadium::orderBy('name', 'asc')->paginate(10, ['*'], 'stadiums');
        $stadiums->setPageName('stadiums');

        $stadium_sections = StadiumSection::orderBy('name', 'asc')->paginate(10, ['*'], 'stadium_sections');
        $stadium_sections->setPageName('stadium_sections');

        return view('admin.tickets.stadiums.index', compact('stadiums', 'stadium_sections'));
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
     * @param  \App\Http\Requests\StoreStadiumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStadiumRequest $request)
    {
        $stadiums = new Stadium;
        $data = $request->all();
        $stadiums->create($data);

        return redirect()->route('admin.tickets.stadiums.table.index')->with('success', 'Stadium successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function show(Stadium $stadium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function edit(Stadium $stadium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStadiumRequest  $request
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStadiumRequest $request, $id)
    {
        $stadiums = Stadium::find($id);
        $data = $request->all();
        $stadiums->update($data);

        return redirect()->route('admin.tickets.stadiums.table.index')->with('success', $stadiums->name . ' - successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stadiums = Stadium::find($id);
        $stadiums->delete();

        return redirect()->route('admin.tickets.stadiums.table.index')->with('success', $stadiums->name . ' - successfully deleted!');
    }
}
