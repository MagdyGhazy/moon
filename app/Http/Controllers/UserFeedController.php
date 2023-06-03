<?php

namespace App\Http\Controllers;

use App\Models\UserFeed;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class UserFeedController extends Controller
{
    use UploadImages;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserFeed::get();

        return view('admin.userfeed.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $this->uploadImage($request,'users');

        UserFeed::create([
            'name'=> $request->name,
            'comment'=> $request->comment,
            'image'=>$path,

        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserFeed  $userFeed
     * @return \Illuminate\Http\Response
     */
    public function show(UserFeed $userFeed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserFeed  $userFeed
     * @return \Illuminate\Http\Response
     */
    public function edit(UserFeed $userFeed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserFeed  $userFeed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserFeed $userFeed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserFeed  $userFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserFeed::findorfail($id)->delete();

        return redirect()->back();
    }
}
