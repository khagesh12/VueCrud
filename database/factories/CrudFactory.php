<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Crud::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'color' => randomColor(),
        'user_id' => rand(1, 3)
    ];
});

function randomColor(){
    switch(rand(0,3)){
        case 0:
            return "green";
        break;
        case 1:
            return "red";
        break;
        case 2:
            return "blue";
        break;
        case 3:
            return "yellow";
        break;
    }

    return "white";
}
