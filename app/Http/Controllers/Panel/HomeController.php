<?php

namespace App\Http\Controllers\Panel;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('panel.pages.home');
    }
}
