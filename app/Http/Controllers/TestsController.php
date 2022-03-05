<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestsController extends Controller
{
    public function one(){
        
        $results = DB::table('stories')
            ->orderBy('id','DESC')
            ->get();

        return view('tests.one',compact("results"));
    }
}
