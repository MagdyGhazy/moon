<?php

namespace App\Http\Controllers;

use App\Models\MainAbout;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class MainAboutController extends Controller
{
    use UploadImages;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Abouts = MainAbout::get();
        return view('admin.about.main.index',compact('Abouts'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $path = $this->uploadImage($request,'mainAbout');

        MainAbout::create([
            'title'=> $request->title,
            'discription'=> $request->discription,
            'image'=> $path,
        ]);

        return redirect()->route('admin.main.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainAbout  $about
     * @return \Illuminate\Http\Response
     */
    public function show(MainAbout $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainAbout  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about=MainAbout::findorfail($id);
        return view('admin.about.main.edit',compact('about'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainAbout  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $about=MainAbout::findorfail($id);

        if ($request->image == ""){
            $path = $about-> image;
        }else{
            $path=$this->uploadImage($request,'mainAbout');
        }

        $about->update([
            'title'=>$request->title,
            'discription'=>$request->discription,
            'image'=> $path,
        ]);
        return redirect()->route('admin.main.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainAbout  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        MainAbout::findorfail($id)->delete();


        return redirect()->route('admin.main.index');
    }
}


