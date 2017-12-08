<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Escape extends Controller
{
    function index(Request $request) {
        $id = $request->input('id');
        return view('escape',compact('id'));
    }
}
