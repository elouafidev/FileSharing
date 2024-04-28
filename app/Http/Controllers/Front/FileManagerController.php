<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use App\Models\Sheet;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    public function index(Request $request){
        $Folder = null;

        if ($request->has('id') && $request->input('id') != null){
            $Folder = Folder::find($request->input('id'));
            if ( $Folder == null) abort(404);
        }else {$Folder = Folder::Root();}

        $data['folder'] = $Folder;
        $data['folders'] = Folder::where('parent_id', $Folder->id)->get();
        $data['Sheets'] = Sheet::where('folder_id', $Folder->id)->get();
        return view('front.pages.file_manager',$data);
    }
}
