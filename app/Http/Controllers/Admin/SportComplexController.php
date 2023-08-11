<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SportComplex\StoreSportComplexRequest;
use App\Http\Requests\Admin\SportComplex\UpdateSportComplexRequest;
use App\Models\Area;
use App\Models\SportCategory;
use App\Models\SportComplex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SportComplexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:sport_complex-list|sport_complex-create|sport_complex-edit|sport_complex-delete', ['only' => ['index','show']]);
         $this->middleware('permission:sport_complex-create', ['only' => ['create','store']]);
         $this->middleware('permission:sport_complex-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sport_complex-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $complexes  =   SportComplex::paginate(10);
        return view('admin.sport_complexes.index', compact('complexes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =   SportCategory::all();
        $areas      =   Area::all();

        return view('admin.sport_complexes.create', compact('categories', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $images = array();
        $destination = public_path('admin/images/complexes/');
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
        $data['image'] = implode("|",$images);

        $complexes = SportComplex::create($data);

        return redirect()->route('admin.complexes.table.index')->with('success', $complexes->name .'- successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=SportComplex::whereId($id)->first();

        return view('admin.sport_complexes.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complexes = SportComplex::whereId($id)->first();
        $categories = SportCategory::all();
        $areas = Area::all();

        return view('admin.sport_complexes.edit', compact('complexes', 'categories', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = SportComplex::find($id);
        $data = $request->all();
        
        $images = array();
        $destination = public_path('admin/images/complexes/');

        if ($request->file('image') !== null)
        {
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
            $data['image'] = implode("|",$images);
        }

        $item->update($data);

        return redirect()->route('admin.complexes.table.index')->with('success', $item->name .'- successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = SportComplex::find($id);
        
        if ($model->image == null)
        {
            $model->delete();
        }
        else {
            $model->deleteImage();
            $model->delete();
        }

        return redirect()->route('admin.complexes.table.index')->with('success', 'Complex successfully deleted!');
    }
}
