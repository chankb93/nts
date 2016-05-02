<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MindefCriteria extends Model
{
    //protected $table = 'napfacriteria';
    //protected $fillable = array('gender', 'dec');
    public function mindefAge()
    {
      return $this->belongsTo('App\MindefAge');
    }
}
