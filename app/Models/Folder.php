<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'hidden',
        'parent_id'
    ];

    // get parent Folders
    public function Parent()
    {
        return $this->parent_id == null ? null :  Folder::find($this->parent_id);
    }

    // get children Folders
    public function Folders()
    {
        return $this->hasOne('App\Folder','parent_id','id');
    }
    // get children Objects
    public function Sheets()
    {
        return $this->hasOne('App\Sheet','folder_id','id');
    }

    /**
     * check is Hidden if not check Parent if hidden if not return false
     * @return bool
     */
    function isHidden(){
        return (bool)$this->hidden ?: (($ParentFolder = $this->Parent()) == null ? false : $ParentFolder->isHidden());
    }

    /*
     *  get path folder in array list
     */
    function Path(){
        $aar = ($ParentFolder = $this->Parent() ) == null ? [] : $ParentFolder->path();
        array_push($aar,['id'=>$this->id,'name'=>$this->name]);
        return $aar;
    }

    public function delete()
    {
        Sheet::where('sheet_id','=',$this->id)->delete();
        $childrenFolders = Folder::where('parent','=',$this->id)->get();
        foreach ($childrenFolders as $Folder){ $Folder->delete(); }
        return parent::delete(); // TODO: Change the autogenerated stub
    }

    public static function Root(){
        return Folder::where('parent_id','=',null)->get()->first();
    }

}