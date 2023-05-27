<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class test extends Controller
{

    public function index()
    {
        $about1 = About::get()->where('id',1);
        return view('index',compact('about1'));

    }
}
