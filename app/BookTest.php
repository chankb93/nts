<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTest extends Model
{
    protected $table = 'book_tests';

    public function napfaDate()
    {
      return $this->belongsTo('App\NapfaDate');
    }

}
