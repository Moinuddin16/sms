<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmsPaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sms_payment_types')->insert([
            ['parent_id' => 0, 'name' => "Monthly"],
            ['parent_id' => 0, 'name' => "Semesterly"],
            ['parent_id' => 0, 'name' => "Termly"],
            ['parent_id' => 0, 'name' => "Occasionally"],
            ['parent_id' => 0, 'name' => "Yearly"],
            ['parent_id' => 1, 'name' => "January"],
            ['parent_id' => 1, 'name' => "February"],
            ['parent_id' => 1, 'name' => "March"],
            ['parent_id' => 1, 'name' => "April"],
            ['parent_id' => 1, 'name' => "May"],
            ['parent_id' => 1, 'name' => "June"],
            ['parent_id' => 1, 'name' => "July"],
            ['parent_id' => 1, 'name' => "August"],
            ['parent_id' => 1, 'name' => "September"],
            ['parent_id' => 1, 'name' => "Octorbar"],
            ['parent_id' => 1, 'name' => "November"],
            ['parent_id' => 1, 'name' => "December"],
            ['parent_id' => 2, 'name' => "1st Semester"],
            ['parent_id' => 2, 'name' => "2nd Semester"],
            ['parent_id' => 2, 'name' => "3rd Semester"],
            ['parent_id' => 3, 'name' => "1st Term"],
            ['parent_id' => 3, 'name' => "2nd Term"],
            ['parent_id' => 3, 'name' => "3rd Term"],
         
        ]);
    }
}
