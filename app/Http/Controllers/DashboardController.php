<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::orderBy('created_at', 'DESC')->paginate(20);

        if (request()->has('search')) {
            $searchTerm = request()->input('search'); 
            $ideas = Idea::where('content', 'like', "%{$searchTerm}%")->orderBy('created_at', 'DESC')->paginate(20);
        }

        return view('dashboard', compact('ideas'));
    }
}
