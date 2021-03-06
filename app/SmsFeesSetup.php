<?php

namespace App;

use App\SmsFee as AppSmsFee;
use Illuminate\Database\Eloquent\Model;


class SmsFeesSetup extends Model
{
    public function getPaymentClassAttribute()
    {
        $class = SmsClass::find($this->class);
        return $class->name;
    }
    public function getPaymentGroupAttribute()
    {
        $group = SmsGroup::find($this->group);
        return $group->name;
    }
    public function getPaymentSectionAttribute()
    {
        $section = SmsSection::find($this->section);
        return $section->name;
    }
    public function getPaymentSessionAttribute()
    {
        $session = SmsSession::find($this->session);
        return $session->name;
       
    }
    public function getPaymentYearAttribute()
    {
        $year = SmsYear::find($this->year);
        return $year->name;
    }
    public function getPaymentFeesAttribute()
    {
        $fees = AppSmsFee::find($this->fees);
        return $fees->name;
    }
    public function getPaymentTypeNameAttribute()
    {
        $paymentType = SmsPaymentType::find($this->payment_type);
        return $paymentType->name;
    }
    public function getPaymentTypeIdAttribute()
    {
        $paymentType = SmsPaymentType::find($this->payment_type);
        return $paymentType->id;
    }
    public function getIsEditableAttribute()
    {
        $isEditable = SmsGenerateFeesBook::where('fees_setup_id',$this->id)->where('payment_status',1)->first();
        return empty($isEditable) ? $isEditable = 1 : $isEditable = 0;
    }
    public function feesData ()
    {
        return $this->belongsTo('App\SmsFee','fees','id');
    }

  
}
