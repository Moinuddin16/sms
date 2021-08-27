<?php

use App\SmsStudent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\factory\SmsStudentFactory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(SmsClassTableSeeder::class);
        // $this->call(SmsGroupTableSeeder::class);
        // $this->call(SmsSessionTableSeeder::class);
        // $this->call(SmsYearTableSeeder::class);
  
        factory(SmsStudent::class, 100)->create()->each(function ($student) {
            $student->posts()->save(factory(SmsStudent::class)->make());
        });
        
    }
}
