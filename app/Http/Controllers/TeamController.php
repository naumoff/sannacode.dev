<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
    	$teams = \App\Team::all();
    	return view('includes.teams',compact('teams'));
    }
}
