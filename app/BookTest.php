<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTest extends Model
{
    //protected $table = 'napfadates';
    //protected $fillable = array('school_id', 'regOpenDate', 'regCloseDate', 'testDate', 'venue', 'regMax', 'bidNumStart', 'stations');

    public function napfaDate()
    {
      return $this->belongsTo('App\NapfaDate');
    }

}
