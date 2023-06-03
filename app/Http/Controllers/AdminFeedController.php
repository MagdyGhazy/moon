<?php

namespace App\Http\Controllers;

use App\Models\AdminFeed;
use App\Models\UserFeed;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class AdminFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = AdminFeed::get();

        return view('admin.adminfeed.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminfeed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Search = UserFeed::select('*')->where('id','=',$request->commentId)->get();


        AdminFeed::create([

            'name'=>$Search[0]->name,
            'comment'=>$Search[0]->comment,
            'image'=>$Search[0]->image,
        ]);

        return redirect()->route('admin.adminfeed.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminFeed  $adminFeed
     * @return \Illuminate\Http\Response
     */
    public function show(AdminFeed $adminFeed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminFeed  $adminFeed
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminFeed $adminFeed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminFeed  $adminFeed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminFeed $adminFeed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminFeed  $adminFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminFeed::findorfail($id)->delete();

        return redirect()->back();
    }
}
