<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SmsClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sms_classes')->insert([
            ['name' => 'vi'],
            ['name' => 'vii'],
            ['name' => 'viii'],
            ['name' => 'ix'],
            ['name' => 'x']
        ]);
    }
}
