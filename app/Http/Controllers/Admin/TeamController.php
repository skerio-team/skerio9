<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SportCategory;
use App\Models\Team;
use App\Http\Requests\Admin\Team\StoreTeamRequest;
use App\Http\Requests\Admin\Team\UpdateTeamRequest;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:team-list|team-create|team-edit|team-delete', ['only' => ['index','show']]);
         $this->middleware('permission:team-create', ['only' => ['create','store']]);
         $this->middleware('permission:team-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:team-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $items=Team::paginate(10);

        return view('admin.teams.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sport_categories=SportCategory::all();


        return view('admin.teams.create', compact('sport_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        $data=$request->all();

        if ($request->hasFile('image')) {
            $file=$request->image;
            $image_name=time().$file->getClientOriginalName();
            $file->move('admin/images/teams/', $image_name);
            $data['image']=$image_name;
        }

        $team=Team::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Ma`lumot yaratildi!');
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
        $item=Team::whereId($id)->first();
        $sport_categories=SportCategory::all();


        return view('admin.teams.edit', compact('item', 'sport_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, $id)
    {
        $item=Team::find($id);
        $data=$request->all();
        if ($request->hasFile('image')) {
            $file=$request->image;
            $image_name=time().$file->getClientOriginalName();
            $file->move('admin/images/teams/', $image_name);
            $data['image']=$image_name;
        }

        $item->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Ma`lumot tahrirlandi!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::destroy($id);

        return redirect()->route('admin.team.index')->with('warning', "Ma`lumot o'chirildi!");

    }
}
