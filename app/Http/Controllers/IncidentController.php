<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncidentController extends Controller
{
    //

    public function new()
	{
	
		return view('new');
	}
}
