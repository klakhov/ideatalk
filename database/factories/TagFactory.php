<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Tag;
use Faker\Generator as Faker;

try{
    $factory->define(Tag::class, function (Faker $faker) {
        return [
            'name'=> $faker->word(),
        ];
    });
}catch(Exception $exception){
    //do nothing
}
