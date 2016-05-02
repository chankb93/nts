<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewRegister extends Model
{
    protected $table = 'view_registers';

    public function bookTest()
    {
      return $this->belongsTo('App\BookTest');
    }

}
