<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NapfaDate extends Model
{
    //protected $table = 'napfadates';
    //protected $fillable = array('school_id', 'regOpenDate', 'regCloseDate', 'testDate', 'venue', 'regMax', 'bidNumStart', 'stations');

    protected $casts = [
      'stations' => 'array',
    ];

    public function school()
    {
      return $this->belongsTo('App\School');
    }

    public function getStationsAttribute($value)
    {
      return json_decode($value);
    }

    public function setStationsAttribute($value)
    {
      $this->attributes['stations'] = json_encode($value);
    }
}
