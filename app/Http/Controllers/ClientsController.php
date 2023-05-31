<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Traits\UploadImages;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    use UploadImages;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::get();

        return view('admin.clients.index',compact('clients',));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $path = $this->uploadLogo($request,'clint');

        Clients::create([

            'name'=> $request->name,
            'logo'=> $path,
        ]);

        return redirect()->route('admin.client.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients=Clients::findorfail($id);
        return view('admin.clients.edit',compact('clients'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $clients=Clients::findorfail($id);


        if ($request->logo == ""){
            $path = $clients->logo;
        }
        else {
            $path = $this->uploadLogo($request,'clint');
        }

        $clients->update([
            'name'=> $request->name,
            'logo'=> $path,
        ]);
        return redirect()->route('admin.client.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Clients::findorfail($id)->delete();


        return redirect()->route('admin.client.index');
    }
}

