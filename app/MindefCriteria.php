<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MindefCriteria extends Model
{
    protected $table = 'mindef_criterias';

    public function mindefAge()
    {
      return $this->belongsTo('App\MindefAge');
    }
}
