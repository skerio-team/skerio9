<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Write Your Code..
     *
     * @return string
    */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'comment'=>'required',
        ]);
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);

        return back();
    }
}
