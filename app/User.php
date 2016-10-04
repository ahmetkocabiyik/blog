<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany("App\Role","role_user");
    }

    public function yetkisi_var_mi($yetki)
    {
        foreach($this->roles()->get() as $role)
        {
            if($role->name == $yetki)
            {
                return true;
                break;
            }
        }
        return false;
    }




}
