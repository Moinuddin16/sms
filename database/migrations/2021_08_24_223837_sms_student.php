<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SmsStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('gender');
            $table->date('date_of_birth');
            $table->text('present_address');
            $table->string('sms_no');
            $table->integer('session');
            $table->integer('year');
            $table->integer('class');
            $table->integer('group');
            $table->integer('section');
            $table->integer('active_status')->default(1);
            $table->BigInteger('roll_no');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      
    }
}
