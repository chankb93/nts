<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewRegister extends Model
{
    //protected $table = 'napfadates';
    //protected $fillable = array('school_id', 'regOpenDate', 'regCloseDate', 'testDate', 'venue', 'regMax', 'bidNumStart', 'stations');

    public function bookTest()
    {
      return $this->belongsTo('App\BookTest');
    }

}
