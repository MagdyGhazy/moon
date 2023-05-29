<?php

namespace App\Http\Controllers;

use App\Models\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $Portfolio =Web::get();
        return view('admin.Portfolio.web.Portfolio',compact('Portfolio'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Portfolio.web.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Web::create([
            'WebName'=> $request->WebName,
            'WebImage'=>$request->WebImage,
            'WebLinke'=> $request->WebLinke,
        ]);
        $Portfolio=Web::get();
        return view('admin.Portfolio.web.Portfolio',compact('Portfolio'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function show(Web $web)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Portfolio=Web::findorfail($id);
        return view('admin.Portfolio.web.edit',compact('Portfolio'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Portfolio=Web::findorfail($id);
        $Portfolio->update([
            'WebName'=> $request->WebName,
            'WebImage'=>$request->WebImage,
            'WebLinke'=> $request->WebLinke,
        ]);
        return redirect()->route('admin.WEB.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Web::findorfail($id)->delete();
        return redirect()->route('admin.WEB.index');
    }
}
