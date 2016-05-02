<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NapfaDate extends Model
{
    protected $table = 'napfa_dates';

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
