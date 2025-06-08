<?php

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function index ()
    {
        return view("pages.home-page.index-home");
    }
}
