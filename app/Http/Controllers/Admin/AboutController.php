<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::latest()->first();
        return view('admin.abouts.index-about',compact('about'));
    }

    public function edit()
    {
        return view('admin.abouts.edit-about');
    }
    
   
}
