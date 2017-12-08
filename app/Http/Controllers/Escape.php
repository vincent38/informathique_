<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Escape extends Controller
{
    function index(Request $request) {
        $myId = $request->route('id', 0);
        return view('escape',compact('myId'));
    }
}
