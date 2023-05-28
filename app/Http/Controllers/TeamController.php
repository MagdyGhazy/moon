<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::get();
        return view('admin.team.index',compact('teams'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Team::create([
            'name'=> $request->name,
            'job'=> $request->job,
            'image'=>$request->image,
            'fb'=> $request->fb,
            'li'=> $request->li,
            'gm'=> $request->gm,
            'ig'=> $request->ig,
        ]);

        return redirect()->route('admin.team.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $about
     * @return \Illuminate\Http\Response
     */
    public function show(Team $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about=Team::findorfail($id);
        return view('admin.team.edit',compact('about'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $about=Team::findorfail($id);
        $about->update([
            'name'=> $request->name,
            'job'=> $request->job,
            'fb'=> $request->fb,
            'li'=> $request->li,
            'gm'=> $request->gm,
            'ig'=> $request->ig,
        ]);
        return redirect()->route('admin.team.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Team::findorfail($id)->delete();


        return redirect()->route('admin.team.index');
    }
}

