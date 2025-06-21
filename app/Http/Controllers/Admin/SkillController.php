<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PageController;
use App\Models\Experience;
use App\Models\Media;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $services= Service::orderBy('id', 'DESC')->get();
        $services= Service::orderBy('id', 'DESC')->get();
        $services= Service::orderBy('id', 'DESC')->get();
        $projects= Project::orderBy('id', 'DESC')->get();
        $medoas= Media::orderBy('id', 'DESC')->get();
        $testimonials= Testimonial::orderBy('id', 'DESC')->get();
        $experiences= Experience::orderBy('id', 'DESC')->get();
        $users= User::orderBy('id', 'DESC')->get();
        $projects= Project::orderBy('id', 'DESC')->get();
        $medoas= Media::orderBy('id', 'DESC')->get();
        $testimonials= Testimonial::orderBy('id', 'DESC')->get();
        $experiences= Experience::orderBy('id', 'DESC')->get();
        $users= User::orderBy('id', 'DESC')->get();
     

        $skills= Skill::with('service')->orderBy('id', 'DESC')->get();
        return view('admin.skills.index-skills',compact('skills'));
    }
}
