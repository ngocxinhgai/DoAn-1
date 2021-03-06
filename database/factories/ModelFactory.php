<?php

use App\User;
use App\Models\NumberRequest;
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
    $gender = $faker->randomElement(['male', 'female']);
    $role_id = $faker->randomElement(['male', 'female']);
    $company = $faker->randomElement(['Bạch Mai', 'Hoài Đức', 'Thanh Nhàn', 'Y Hà Nội']);

    return [
        'name' => $faker->name,
        'gender' => $gender,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'id_number' => mt_rand(111111111111, 999999999999),
        'id_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'id_address' => $faker->address,
        'permanent_residence' => $faker->address,
        'staying_address' => $faker->address,
        'job' => 'doctor',
        'company' => $company,
        'avatar' => 'images.jpeg',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('123456'),
        'role_id' => 2,
        'remember_token' => Str::random(10),
    ];
});

$factory->define(NumberRequest::class, function (Faker $faker) {
    $user_id = $faker->randomElement([1, 2, 3, 4, 5, 8]);
    $token = $faker->randomElement([1, 2, 3, 4]);
    $username = $faker->randomElement(['Leo Swift', 'Mr. Elijah McCullough', 'Prof. Brook Denesik IV', 'Miss Adelia Runte', 'Prof. Hester Kuhic', 'Vladimir Walter PhD']);
    $company = $faker->randomElement(['Bạch Mai', 'Hoài Đức', 'Thanh Nhàn', 'Y Hà Nội']);

    return [
        'user_id' => $user_id,
        'end_entity_profile' => 'EntityProfilesEndUser',
        'username' => $username,
        'password' => bcrypt('123456'),
        'email' => $faker->unique()->safeEmail,
        'common_name' => $username,
        'organization' => $company,
        'country' => 'Việt Nam',
        'locality' => 'Việt Nam',
        'province' => '',
        'certificate_profile' => 'CertificateProfileEndUser',
        'CA' => 'CAHust',
        'token_id' => $token,
        'days_to_return' => $faker->date($format = 'Y-m-d', $min = 'now'),
        'status' => 0,
    ];
});
