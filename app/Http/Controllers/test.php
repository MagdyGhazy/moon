<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\app;
use App\Models\MainAbout;
use App\Models\Service;
use App\Models\Team;
use App\Models\Web;
use Illuminate\Http\Request;

class test extends Controller
{

    public function index()
    {
        $about = About::get();
        $About = MainAbout::get();
        $Services = Service::get();
        $teams = Team::get();
        $web = Web::get();
        $app = app::get();
        return view('index', compact('about', 'About', 'Services', 'teams', 'web', 'app'));
    }
}
