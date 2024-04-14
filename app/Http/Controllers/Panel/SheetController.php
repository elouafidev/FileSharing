<?php

namespace App\Http\Controllers\Panel;


use App\Models\File;
use App\Models\Folder;
use App\Models\Sheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SheetController extends Controller
{

    public function __construct()
    {
        /*parent::__construct();*/
    }

    public function create($folder_id,request $request)
    {

        if(Folder::find($folder_id) == null) abort(404);
        $data=[
            'folder_id' => $folder_id,
        ];

        return view('panel.pages.sheet.create', $data);

    }
    public function store($folder_id,request $request)
    {
        $request->validate([
            'title' => ['required','unique:sheets,Name,'.$folder_id.',folder_id'],
        ]);
        $Sheet = new Sheet();
        $Sheet->title = $request->input('title');
        $Sheet->description = $request->input('description');
        $Sheet->folder_id = $folder_id;
        $Sheet->hidden = $request->input('hidden');
        $Sheet->created_user_id = auth::id();
        $Sheet->save();

        $Sheet_id = $Sheet->id;
        if($request->has('Files')){
            $Files =$request->input('Files');
            foreach ($Files as $key => $iFile){
                $File = new File();
                $File->name = $iFile['name'];
                $File->url = $iFile['url'];
                $File->password = $iFile['password'];
                $File->size = $iFile['size'];
                $File->sheet_id = $Sheet_id;
                $File->save();
            }
        }
        return Redirect::route('panel.folder.index',['folder_id' => $folder_id]);
    }


    public  function  destroy($folder_id,$id){
        File::where('sheet_id',$id)->delete();
        $folder_id = Sheet::find($id)->folder_id;
        Sheet::find($id)->delete();
        return Redirect::route('panel.folder.index',['id' => $folder_id]);
    }

    public function edit($folder_id,$id){
        if(Sheet::find($id) == null) abort(404);
        $data=[
            'sheet' => Sheet::find($id),
            'files' => File::where('sheet_id',$id)->get(),
        ];
        return view('panel.pages.sheet.edit', $data);
    }

    public function update($folder_id,$id,request $request){
        $request->validate([
            'title' => ['required','unique:sheets,Name,'.$id.',id,ParentFolder_id,ParentFolder_id'],
        ]);

        $Sheet = Sheet::find($id);
        $Sheet->title = $request->input('title');
        $Sheet->description = $request->input('description');
        $Sheet->hidden = $request->input('hidden');
        $Sheet->updated_user_id = auth::id();
        $Sheet->save();

        $Sheet_id = $Sheet->id;
        $Files =$request->input('Files');
        $AFiles =$request->input('AFiles');
        $deleteFiles =$request->input('dfiles');
        if($deleteFiles != null){
            foreach ($deleteFiles as $dfile){
                File::find($dfile)->delete();
            }
        }
        if($Files != null)
            foreach ($Files as $key => $iFile){
                $File = File::find($key);
                $File->name = $iFile['name'];
                $File->url = $iFile['url'];
                $File->password = $iFile['password'];
                $File->size = $iFile['size'];
                $File->sheet_id = $Sheet_id;
                $File->save();
            }
        if($AFiles != null)
            foreach ($AFiles as $key => $iFile){
                $File = new File();
                $File->name = $iFile['name'];
                $File->url = $iFile['url'];
                $File->password = $iFile['password'];
                $File->size = $iFile['size'];
                $File->sheet_id = $Sheet_id;
                $File->save();
            }
        return Redirect::route('panel.folder.index',['index' => $Sheet->folder_id]);
    }
}
