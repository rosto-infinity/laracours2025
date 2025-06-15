<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Service;

class PageController extends Controller
{
    public function index()
    {
       
       $abouts = About::latest()->first();
       $services = Service::latest()->get();
        return view('pages.home-page.index-home', compact('abouts','services'));
    }
}
