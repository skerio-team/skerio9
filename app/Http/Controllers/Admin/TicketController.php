<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreTicketRequest;
use App\Http\Requests\Admin\Ticket\UpdateTicketRequest;
use App\Models\SportCategory;
use App\Models\StadiumSection;
use App\Models\Team;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:ticket-list|ticket-create|ticket-edit|ticket-delete', ['only' => ['index','show']]);
         $this->middleware('permission:ticket-create', ['only' => ['create','store']]);
         $this->middleware('permission:ticket-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:ticket-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $tickets = Ticket::paginate(10);

        return view('admin.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SportCategory::all();
        $teams = Team::all();
        $stadium_sections = StadiumSection::all();

        return view('admin.tickets.create', compact('categories', 'teams', 'stadium_sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $data = $request->all();
        $images = array();
        $destination = public_path('admin/images/tickets/');
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

        $tickets = Ticket::create($data);

        return redirect()->route('admin.tickets.table.store')->with('success', 'Ticket has successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Ticket::whereId($id)->first();

        return view('admin.tickets.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tickets = Ticket::find($id);
        $categories = SportCategory::all();
        $teams = Team::all();
        $stadium_sections = StadiumSection::all();

        return view('admin.tickets.edit', compact('tickets', 'categories', 'teams', 'stadium_sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, $id)
    {
        $item = Ticket::find($id);
        $data = $request->all();

        if ($request->file('image') !== null)
        {
            $images = array();
            $destination = public_path('admin/images/tickets/');

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

        return redirect()->route('admin.tickets.table.index')->with('success', $item->name . ' - successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tickets = Ticket::find($id);

        if ($tickets->image == null)
        {
            $tickets->delete();
        }
        else {
            $tickets->deleteImage();
            $tickets->delete();
        }

        return redirect()->route('admin.tickets.table.index')->with('success', $tickets->name . ' - successfully deleted!');
    }
}
