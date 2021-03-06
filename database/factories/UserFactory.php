<?php

use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {

    $gender = $faker->randomElement(['male', 'female', 'none']);
    $country = $faker->randomElement(['India', 'Philippines', 'Israel']);
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'birthdate' => $faker->dateTime(),
        'gender' => $gender,
        'country' => $country,
        'email' => $faker->unique()->safeEmail,
        'profile_picture_id' => 'https://drive.google.com/uc?id=1dC9UWqe3hOQ3bB0dEyQuyxTsKFwzuoXG&export=media',
        'cover_photo_id' => 'https://drive.google.com/uc?id=1dC9UWqe3hOQ3bB0dEyQuyxTsKFwzuoXG&export=media',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

