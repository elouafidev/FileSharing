<?php

namespace App\Http\Controllers\Front;

use App\Models\Sheet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SheetController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'id' => ['required', 'integer', 'min:1', 'max:99999',Rule::exists('sheets')],
        ]);
        $sheet = Sheet::find($request->id);

        return view('front.pages.sheet', compact('sheet'));
    }
}
