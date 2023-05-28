<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\MainAbout;
use App\Models\Team;
use Illuminate\Http\Request;

class test extends Controller
{

    public function index()
    {
        $about = About::get();
        $About = MainAbout::get();
        $teams = Team::get();

        return view('index',compact('about','About','teams'));

    }
}
