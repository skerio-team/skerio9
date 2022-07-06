<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\News;
use App\Models\ShopLike;
use App\Models\Product;

class LikeController extends Controller
{

    public function index()
    {
        return "salom";
    }

    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $save = Like::where('user_id',$user_id)->get();

        if ($save) {
            foreach($save as $post){
                if($post->news_id == $request->news_id){
                    $post->delete();
                    return "deleted";
                }
            }
            
        }

            Like::create($request->all());
            return "created";
    }

    public function shopstore(Request $request)
    {
        
        $user_id = $request->user_id;

        $save = ShopLike::where('user_id',$user_id)->get();

        if ($save) {
            foreach($save as $post){
                if($post->product_id == $request->product_id){
                    $post->delete();
                    return "deleted";
                }
            }
            
        }

            ShopLike::create($request->all());
            return "created";
    }
    
}

