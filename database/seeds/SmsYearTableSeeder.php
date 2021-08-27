<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmsYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sms_years')->insert([
            ['name' => "2010(Jan)-2010(Dec)" , "year" => "2010"],
            ['name' => "2011(Jan)-2011(Dec)" , "year" => "2011"],
            ['name' => "2012(Jan)-2012(Dec)" , "year" => "2012"],
            ['name' => "2013(Jan)-2013(Dec)" , "year" => "2013"],
            ['name' => "2014(Jan)-2014(Dec)" , "year" => "2014"],
            ['name' => "2015(Jan)-2015(Dec)" , "year" => "2015"],
            ['name' => "2016(Jan)-2016(Dec)" , "year" => "2016"],
            ['name' => "2017(Jan)-2017(Dec)" , "year" => "2017"],
            ['name' => "2018(Jan)-2018(Dec)" , "year" => "2018"],
            ['name' => "2019(Jan)-2019(Dec)" , "year" => "2019"],
            ['name' => "2020(Jan)-2020(Dec)" , "year" => "2020"],
            ['name' => "2021(Jan)-2021(Dec)" , "year" => "2021"],
        ]);
    }
}
