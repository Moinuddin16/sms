<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsGenerateFeesBook extends Model
{
  public function students()
  {
      return $this->hasMany(SmsStudent::class,'id','student_id');
  }
  public function feesSetup ()
  {
      return $this->belongsTo(SmsFeesSetup::class,'fees_setup_id','id');
  }
}
