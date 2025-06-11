<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Controllers\Controller;


class AboutController extends Controller
{
    public function index()
    {
        
    }

    public function edit()
    {
       $about = About::latest()->first();
    //    dd($about);
        return view('admin.abouts.edit-about',
            [
                'about' => $about,
            ]
        );
    }
    
   
}
