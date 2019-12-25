<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
    $images = [
        'image_def'=>'/uploads/previews/def.jpg',
        'image_150'=>'/uploads/previews/img150.jpg',
        'image_90'=>'/uploads/previews/img90.jpg',
        'image_300_200'=>'/uploads/previews/img300_200.jpg'
    ];
    return [
        'user_id' => factory(App\User::class),
        'header' => $faker->paragraph(1),
        'description' => $faker->paragraph(2),
        'body' => $faker->text(8000),
        'date'=>$faker->monthName.' '.$faker->numberBetween(1,31),
        'token'=>Str::random(10),
        'images'=>$images,
    ];
});
