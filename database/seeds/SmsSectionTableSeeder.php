<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmsSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sms_sections')->insert([
            ['name' => 'A'],
            ['name' => 'B'],
            ['name' => 'C'],
        ]);
    }
}
