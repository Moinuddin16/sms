<?php

namespace App;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class SmsStudent extends Model
{
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function getStudentGenderAttribute()
    {
        switch ($this->gender) {
            case 1:
              return "Female";
              break;
            case 2:
              return "male";
              break;
            case 2:
              return "Other";
              break;
          }
       
    }
    public function getStudentClassAttribute()
    {
        $class = SmsClass::find($this->class);
        return $class->name;
    }
    public function getStudentGroupAttribute()
    {
        $group = SmsGroup::find($this->group);
        return $group->name;
    }
    public function getStudentSectionAttribute()
    {
        $section = SmsSection::find($this->section);
        return $section->name;
    }
    public function getStudentSessionAttribute()
    {
        $session = SmsSession::find($this->session);
        return $session->name;
       
    }
    public function getStudentYearAttribute()
    {
        $year = SmsYear::find($this->year);
        return $year->name;
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $date = date('Y');
           $last_id = SmsStudent::max('id')+1;
           $model->student_id = $date.str_pad($last_id, 5, '0', STR_PAD_LEFT);
        });
    }
}
