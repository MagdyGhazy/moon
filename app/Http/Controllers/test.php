<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\MainAbout;
use App\Models\Service;
use Illuminate\Http\Request;

class test extends Controller
{

    public function index()
    {
        $about = About::get();
        $About = MainAbout::get();
        $Services= Service::get();
        return view('index',compact('about','About','Services'));

    }
}
