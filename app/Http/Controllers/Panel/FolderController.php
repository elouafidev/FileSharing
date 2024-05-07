<?php

namespace App\Http\Controllers\Panel;


use App\Models\Folder;
use App\Models\Sheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class FolderController extends Controller
{
    public function index(Request $request)
    {
        $Folder = null;

        if ($request->has('id') && $request->input('id') != null){
            $Folder = Folder::find($request->input('id'));
            if ( $Folder == null) abort(404);
        }else {$Folder = Folder::Root();}

        $data['folder'] = $Folder;
        $data['folders'] = Folder::where('parent_id', $Folder->id)->get();
        $data['Sheets'] = Sheet::where('folder_id', $Folder->id)->get();
        return view('panel.pages.folder.index',$data);
    }


    public function create($parent_id,Request $request)
    {
        if(empty(Folder::find($parent_id)))
            abort(404);

        return view('panel.pages.folder.create', ['parent_id' => $parent_id]);

    }
    public function store(request $request)
    {
        $request->validate([
            'parent_id' => 'exists:folders,id',
            'name' => ['required',Rule::unique('folders')->where(
                function ($query) use($request) {
                    return $query->where('parent_id',$request->input('parent_id') );
                })
            ],
        ]);
        $Folder = new Folder();
        $Folder->name = $request->input('name');
        $Folder->description = $request->input('description');
        $Folder->parent_id = $request->input('parent_id');
        $Folder->hidden = $request->input('hidden');

        $Folder->save();
        return Redirect::route('panel.folder.index',['id' => $request->input('parent_id')])
            ->with('success', __('Folder created successfully'));
    }


    public function show($id)
    {
        return Redirect::route('panel.folder.index',['id' => $id]);
    }
    public  function destroy($id){
        $Folder = Folder::find($id);
        $ParentFolder = $Folder->ParentFolder_id;
        $Folder->delete();

        return Redirect::route('panel.folder.index',['id' => $ParentFolder ])
            ->with('success', __('Folder deleted successfully'));
    }


    public function edit($id){
        if(empty($folder = Folder::find($id)) ) abort(404);

        return view('panel.pages.folder.edit',['folder'=>$folder]);
    }


    public function update(Request $request, $id){
        if(empty($Folder = Folder::find($id)) ) abort(404);
        $request->validate([
            'name' => ['required',Rule::unique('folders')->where(
                function ($query) use($Folder) {
                    return $query->where('parent_id', '=',$Folder->parent_id );
                })
            ],
        ]);
        $Folder->name = $request->input('name');
        $Folder->description = $request->input('description');
        $Folder->hidden = $request->input('hidden') == 1;
        $Folder->save();



        return Redirect::route('panel.folder.index',['id' => $Folder->parent_id ])
            ->with('success', __('Folder updated successfully'));
    }
    function getPathFolders($ParentFolder_id)
    {
        $PathFolders = array();
        $i = -1;
        if ($ParentFolder_id != null) {

            do {
                $Folder = Folder::find($ParentFolder_id);
                $i++;
                $PathFolders[$i] = array(
                    'id' => $Folder['id'],
                    'name' => $Folder['name']
                );
                $ParentFolder_id = $Folder['parent_id'];
            } while ($ParentFolder_id != null);

        }
        return $PathFolders;
    }
}
