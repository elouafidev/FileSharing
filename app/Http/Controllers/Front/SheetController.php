<?php

namespace App\Http\Controllers\Front;

use App\Models\Sheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class SheetController extends Controller
{
    public function index(Request $request){

        $validation = Validator::make($request->all(),[
            'id' => ['required', 'integer', 'min:1', 'max:99999',Rule::exists('sheets')],
        ]);
        if($validation->fails()) abort(404);
        if(Auth::guest()) return Redirect::route('noaccess');

        $sheet = Sheet::find($request->id);

        return view('front.pages.sheet', compact('sheet'));
    }
}
