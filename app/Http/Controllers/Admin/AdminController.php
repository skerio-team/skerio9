<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:admin-enter', ['only' => ['dashboard']]);
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
}
