<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoeCriteria extends Model
{
    //protected $table = 'moe_criterias';

    public function moeAge()
    {
      return $this->belongsTo('App\MoeAge');
    }
}
