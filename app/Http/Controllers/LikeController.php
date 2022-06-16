<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\News;

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
}

// public function like($id){
//     $user_id = auth()->guard('api')->user()->id;
//     $save = Like::where('user_id',$user_id)->get();
    
//     if ($save) {
        
//         foreach($save as $post){
//             if($post->post_id == $id){
//                 $post->delete();
//                 return true;
//             }
//         }
//     }

//     $data['user_id'] = $user_id;
//     $data['post_id'] = $id;
//     Like::create($data);
//     return true;
// }