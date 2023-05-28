<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Services = Service::get();
        return view('admin.Services.Services',compact('Services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Services.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Service::create([
            'Services'=> $request->Services,
            'icon'=>$request->icon,
            'ServicesDiscription'=> $request->ServicesDiscription,
        ]);
        $Services = Service::get();
        return view('admin.Services.Services',compact('Services'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Service=Service::findorfail($id);
        return view('admin.services.edit',compact('Service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Service=Service::findorfail($id);
        $Service->update([
            'Services'=> $request->Services,
            'icon'=>$request->icon,
            'ServicesDiscription'=> $request->ServicesDiscription,

        ]);
        return redirect()->route('admin.servces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Service::findorfail($id)->delete();
        return redirect()->route('admin.servces.index');
    }
}
