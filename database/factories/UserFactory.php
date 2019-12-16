<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
    $email = $faker->unique()->safeEmail;
    $profile_token = '@';
    for ($i=0;$i<strlen($email);++$i){
        if($email[$i]=='@') break;
        $profile_token .= $email[$i];
    }
    return [
        'name' => $faker->name,
        'email' => $email,
        'email_verified_at' => now(),
        'password' => '$2y$10$6n61mjgH6oiBmRTnVXD3CeZeAH51YLzWu9MMaEyFbm2E.yhTGr0T.', // passworwd
        'remember_token' => Str::random(10),
        'profile_token' => $profile_token,
        'bio' => $faker->text(500),
        'followers'=>$faker->numberBetween(1,1000)
    ];
});
