<?php

namespace App\Http\Controllers\Front;

use App\Models\Sheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class SheetController extends Controller
{
    public function index(Request $request){
        if(Auth::guest())
        {
            Session::put('url',['intended' => $request->url() ]);
            return Redirect::route('noaccess');
        }
        $request->validate([
            'id' => ['required', 'integer', 'min:1', 'max:99999',Rule::exists('sheets')],
        ]);
        $sheet = Sheet::find($request->id);

        return view('front.pages.sheet', compact('sheet'));
    }
}
