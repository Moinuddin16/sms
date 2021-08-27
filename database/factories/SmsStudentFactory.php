<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;
use App\Model;
use App\SmsStudent;
use Faker\Generator as Faker;

$factory->define(SmsStudent::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'gender' => $faker->numberBetween(1,3),
        'date_of_birth' => $faker->date('Y-m-d'),
        'present_address' => $faker->address(),
        'sms_no' => $faker->phoneNumber(),
        'session' => $faker->numberBetween(1,11),
        'year' =>  $faker->numberBetween(1,11),
        'class' => $faker->numberBetween(1,5),
        'group' => $faker->numberBetween(1,4),
        'section' => $faker->numberBetween(1,3),
        'roll_no' => $faker->randomNumber(5,true),
    ];
});
