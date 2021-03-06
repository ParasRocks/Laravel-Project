<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Photo;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
      return $this->belongsTo('App\Role');
    }

    public function photo()
    {
      return $this->belongsTo('App\Photo');
    }

    public function posts()
    {
      return $this->hasMany('App\Post');
    }

    public function likes()
    {
      return $this->hasMany('App\Like');
    }

    Public function getNameAttribute($name)
    {
      return ucFirst($name);
    }
    //for middleware
    public function isAdmin()
    {
        if($this->role->name=="Administrator" && $this->is_active==1)
        {
          return true;
        }
        else{
          return false;
        }
    }
}
