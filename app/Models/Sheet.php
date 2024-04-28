<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'content',
        'hidden',
        'like_count',
        'created_user_id',
        'Updated_user_id',
        'folder_id'
    ];

    public function Files()
    {
        return $this->hasOne('App\Models\File','sheet_id','id');
    }

    // get parent Folders
    public function Folder()
    {
         return $this->folder_id == null ? null : Folder::find($this->folder_id);
    }

    /*
     * check is Hidden if not check Parent if hidden if not return false
     */
    function isHidden(){
        return (bool)$this->hidden ?: (($ParentFolder =$this->Folder()) == null ? false : $ParentFolder->isHidden());
    }

    public function createrUser()
    {
        return $this->belongsTo(User::class,'created_user_id','id');
    }

}
