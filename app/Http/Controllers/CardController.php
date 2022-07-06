<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Product;

class CardController extends Controller
{
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $save = Card::where('user_id',$user_id)->get();

            Card::create($request->all());
            return "created";
    }

    public function index($id)
    {
        $card = Card::where('user_id', $id)->get();

        $count = count($card);

        return $card;
    }
}
