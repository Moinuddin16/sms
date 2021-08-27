<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SmsFeesSetUps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_fees_setups', function (Blueprint $table) { 
            $table->id();
            $table->integer('session');
            $table->integer('year');
            $table->integer('class');
            $table->integer('group');
            $table->integer('section');
            $table->integer('fees');
            $table->integer('payment_type');
            $table->text('payment_amount');
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
        //
    }
}
