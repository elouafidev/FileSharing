<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Rechercher le rôle par nom
     * @param $name string Nom de rôle
     * @return mixed
     */
    public static function find($name){
        return Role::where('name','=',$name)->get()->first();
    }
}
