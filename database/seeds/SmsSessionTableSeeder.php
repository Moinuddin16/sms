<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmsSessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sms_sessions')->insert([
            ['name' => "Jan'10 to Dec'10" , "year" => "2010"],
            ['name' => "Jan'11 to Dec'11" , "year" => "2011"],
            ['name' => "Jan'12 to Dec'12" , "year" => "2012"],
            ['name' => "Jan'13 to Dec'13" , "year" => "2013"],
            ['name' => "Jan'14 to Dec'14" , "year" => "2014"],
            ['name' => "Jan'15 to Dec'15" , "year" => "2015"],
            ['name' => "Jan'16 to Dec'16" , "year" => "2016"],
            ['name' => "Jan'17 to Dec'17" , "year" => "2017"],
            ['name' => "Jan'18 to Dec'18" , "year" => "2018"],
            ['name' => "Jan'19 to Dec'19" , "year" => "2019"],
            ['name' => "Jan'20 to Dec'20" , "year" => "2020"],
            ['name' => "Jan'21 to Dec'21" , "year" => "2021"],
        ]);
    }
}
