<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * les rôles de utilisateur
     * relation entre le rôle et l'utilisateur
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Roles()
    {
        return $this->belongsToMany(Role::class,'user_roles','user_id','role_id');
    }

    /**
     * vérification si l'utilisateur a ce rôle
     * @param $Role string Role
     * @return bool
     */
    public function hasRole($Role){
        $countRoles = $this->Roles()->where('name',$Role)->count();
        return $countRoles == 1;
    }
    public function isAdmin()
    {
        return $this->roles->pluck( 'name' )->contains( 'admin' );
    }

    public function isVisitor()
    {
        return $this->roles->pluck( 'name' )->contains( 'visitor' );
    }
}
