<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\Company::class, 'admin', function (Faker $faker) {
    return [
        'name' => $faker->company,
        'quota' => mt_rand(10, 700)
    ];
});

$factory->defineAs(App\Employee::class, 'admin', function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email
    ];
});

$factory->defineAs(App\TransferLog::class, 'admin', function (Faker $faker) {
    $ramdomTb = mt_rand(0, 10);

    if ($ramdomTb == 10) {
        $ramdomKb = 0;
        $ramdomMb = 0;
        $ramdomGb = 0;
        $ramdomByte = 0;
    } else {
        $ramdomKb = mt_rand(0, 1023);
        $ramdomMb = mt_rand(0, 1023);
        $ramdomGb = mt_rand(0, 1023);        
        $ramdomByte = mt_rand(0, 1023);
    }

    if ($ramdomKb == 0 && $ramdomMb == 0 && $ramdomGb == 0 && $ramdomTb == 0) 
        $ramdomByte = mt_rand(100, 1023);

    return [
        'date_time' => '2018-01-01 00:00:00',
        'resource' => $faker->url,
        'transferredByte' => $ramdomByte,
        'transferredKb' => $ramdomKb,
        'transferredMb' => $ramdomMb,
        'transferredGb' => $ramdomGb,
        'transferredTb' => $ramdomTb,
    ];
});
