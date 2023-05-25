<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class deleteController extends Controller
{
    public function destroy($id)
    {

        DB::table('abouts')->where('id',$id)->delete();

        return redirect()->route('admin.about.index');
    }
}
