<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->email,
        'logo' => $faker->image(storage_path('app' . DIRECTORY_SEPARATOR . 'public'),100,100, null, false),
        'website' => $faker->domainName,
    ];
});
