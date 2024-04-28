<?php

namespace App\Http\Controllers\Front;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        return Redirect::route('file_manager');
    }
}
