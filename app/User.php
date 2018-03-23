<?php

namespace Siscor;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'username','email', 'password',
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
        return $this->belongsTomany(Role::class);
    }
    public function hasRole($role)
    {
        if(is_string($role)){
            return $this->roles->contains('name',$role);
        }
        return !! $role->intersect($this->roles)->count();
    }

    public function getFullName()
    {
        return $this->name . ' ' . $this->last_name;
    }

    public function position()
    {
        return $this->belongsTo('Siscor\Position');
    }

}
