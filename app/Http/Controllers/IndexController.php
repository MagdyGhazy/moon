<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AdminFeed;
use App\Models\app;
use App\Models\Clients;
use App\Models\MainAbout;
use App\Models\Service;
use App\Models\Team;
use App\Models\Web;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $about = About::get();
        $About = MainAbout::get();
        $Services = Service::get();
        $teams = Team::get();
        $web = Web::get();
        $app = app::get();
        $clients = Clients::get();
        $feeds = AdminFeed::get();
        return view('index', compact('about', 'About', 'Services', 'teams', 'web', 'app','clients','feeds'));
    }
}
