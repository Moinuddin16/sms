<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmsGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sms_groups')->insert([
            ['name' => 'N/A'],
            ['name' => 'Science'],
            ['name' => 'Business Studies'],
            ['name' => 'Humanities']
        ]);
    }
}
