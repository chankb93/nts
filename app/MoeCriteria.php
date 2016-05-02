<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoeCriteria extends Model
{
    //protected $table = 'napfacriteria';
    //protected $fillable = array('gender', 'dec');
    public function moeAge()
    {
      return $this->belongsTo('App\MoeAge');
    }
}
