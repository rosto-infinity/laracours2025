<?php

namespace App\Http\Controllers;

use App\Models\About;

class PageController extends Controller
{
    public function index()
    {
       
       $abouts = About::latest()->first();
        return view('pages.home-page.index-home', compact('abouts'));
    }
}
