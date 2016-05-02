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


    public function isStudent()
    {
      $returnVal = false;
      if ($this->attributes['systemrole'] == 'P') {
        $returnVal = true;
      }

      return $returnVal;
    }

    public function isStaff()
    {
      $returnVal = false;
      if ($this->attributes['systemrole'] == 'S') {
        $returnVal = true;
      }

      return $returnVal;
    }

    public function isInstructor()
    {
      $returnVal = false;
      if ($this->attributes['systemrole'] == 'I') {
        $returnVal = true;
      }
      
      return $returnVal;
    }

}
