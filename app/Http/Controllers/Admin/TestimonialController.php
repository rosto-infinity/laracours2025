<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials= Testimonial::orderBy('id', 'DESC')->get();
        return view('admin.testimonials.index-testimonials',compact('testimonials'));
    }
}
