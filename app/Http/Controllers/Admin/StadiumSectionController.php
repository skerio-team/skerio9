<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStadiumSectionRequest;
use App\Http\Requests\Admin\UpdateStadiumSectionRequest;
use App\Models\StadiumSection;

class StadiumSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreStadiumSectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStadiumSectionRequest $request)
    {
        $data = $request->all();
        $images = array();
        $destination = public_path('admin/images/tickets/stadium_sections/');
        if ($files = $request->file('image'))
        {
            if (!file_exists($destination))
            {
                mkdir($destination, 0777, true);
            }
            foreach ($files as $file) {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move($destination, $name);
                $images[]   =   $name;
            }
        }
        $data['image'] = implode("|", $images);
        
        $stadium_sections = StadiumSection::create($data);
        
        return redirect()->route('admin.tickets.stadiums.table.index')->with('success', 'Stradium section has successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StadiumSection  $stadiumSection
     * @return \Illuminate\Http\Response
     */
    public function show(StadiumSection $stadiumSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StadiumSection  $stadiumSection
     * @return \Illuminate\Http\Response
     */
    public function edit(StadiumSection $stadiumSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStadiumSectionRequest  $request
     * @param  \App\Models\StadiumSection  $stadiumSection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStadiumSectionRequest $request, $id)
    {
        $item = StadiumSection::find($id);
        $data = $request->all();

        if ($request->file('image') !== null)
        {
            $images = array();
            $destination = public_path('admin/images/tickets/stadium_sections/');

            $images_db = explode("|", $item->image);
            foreach ($images_db as $img)
            {
                if (file_exists($destination . $img))
                {
                    unlink($destination . $img);
                }
            }
            $files = $request->file('image');

            foreach ($files as $file) {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move($destination, $name);
                $images[]   =   $name;
            }
            $data['image'] = implode("|", $images);
        }
        
        $item->update($data);

        return redirect()->route('admin.tickets.stadiums.table.index')->with('success', $item->name . ' - successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StadiumSection  $stadiumSection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = StadiumSection::find($id);
        
        if ($item->image == null)
        {
            $item->delete();
        }
        else {
            $item->deleteImage();
            $item->delete();
        }

        return redirect()->route('admin.tickets.stadiums.table.index')->with('success', $item->name . ' - successfully deleted!');
    }
}
