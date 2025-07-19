<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class HomeController extends Controller
{
    public function index()
    {
        $featuredTemplates = Template::where('is_featured', true)
            ->where('is_active', true)
            ->take(6)
            ->get();
            
        return view('home', compact('featuredTemplates'));
    }
}
