<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamInsightsController extends Controller
{
    public function index()
    {
        return view('team-insights.index');
    }
}
