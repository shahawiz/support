<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Ticket;
use App\Department;
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

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//         'remember_token' => Str::random(10),
//     ];
// });

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'content' => $faker->text,
        'slug'=>$faker->slug,
        'status'=>$faker->randomElement(['Pending' ,'Answered', 'Solved']),
        'user_id'=>1,
        'department_id'=>1,
        'priority'=>1,

    ];
});

$factory->define(Department::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'desc' => $faker->text,
    ];
});
