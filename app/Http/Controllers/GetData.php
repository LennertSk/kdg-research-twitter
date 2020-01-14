<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\PublicStream;
use App\Hashtags;

class GetData extends Controller
{
    public function show()
    {
        $hashtags = Hashtags::all();
        return view('index', compact('hashtags'));
    }
    public function showRace()
    {
        $hashtags = Hashtags::all();
        

        // Max range is 110 px from top
        // 450 tweets needed to reach the top

        return view('raceview', compact('hashtags'));
    }


    
}
