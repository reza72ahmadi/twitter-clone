<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()  {
        
        $ideas = Idea::all();
        return view('dashboard', compact('ideas'));
    }
}
