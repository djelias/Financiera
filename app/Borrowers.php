<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Borrowers extends Model
{

  use LogsActivity;
  
    protected $fillable = ['fname','lname','email','phone','addrs1','addrs2','city','state','zip','country','comment','account','balance','image','date_time','status'];
    protected $dates = ['created_at','updated_at'];

    
}
