<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'header' => $faker->paragraph(1),
        'description' => $faker->paragraph(2),
        'body' => $faker->text(350),
        'date'=>$faker->monthName.' '.$faker->numberBetween(1,31),
    ];
});
