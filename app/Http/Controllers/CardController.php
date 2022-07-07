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
        $product = $request->all();
        $save = Card::where('user_id',$user_id)->get();
        if ($save) {
            foreach($save as $product1){
                if($product1->product_id == $request->product_id){
                    $product['quantity'] = $product1->quantity + 1  ;
                    $product1->update($product);
                    return "updated";
                }
            }
        }
            Card::create($request->all());
            return "new created";


    }

    public function index($id)
    {
        $card = Card::where('user_id', $id)->get();

        $count = count($card);

        return $card;
    }
}
