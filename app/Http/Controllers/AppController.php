<?php

namespace App\Http\Controllers;

use App\Models\app;
use App\Http\Controllers\Controller;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class AppController extends Controller
{
    use UploadImages;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Portfolio=app::get();
        return view('admin.Portfolio.app.Portfolio',compact('Portfolio'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Portfolio.app.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $this->loadAppImage($request,'portfolio');

        app::create([
            'AppName'=> $request->AppName,
            'AppImage'=>$path,
            'AppLink'=> $request->AppLink,
        ]);
        $Portfolio=app::get();
        return view('admin.Portfolio.app.Portfolio',compact('Portfolio'));




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\app  $app
     * @return \Illuminate\Http\Response
     */
    public function show(app $app)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\app  $app
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $Portfolio=app::findorfail($id);

        return view('admin.Portfolio.app.edit',compact('Portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\app  $app
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Portfolio=app::findorfail($id);
        if ($request->AppImage == ""){
            $path = $Portfolio->AppImage;
        }  else {

            $path = $this->loadAppImage($request, 'portfolio');
        }
        $Portfolio->update([
            'AppName'=> $request->AppName,
            'AppImage'=>$path,
            'AppLink'=> $request->AppLink,
        ]);
        return redirect()->route('admin.app.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\app  $app
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        app::findorfail($id)->delete();
        return redirect()->route('admin.app.index');
    }
}
