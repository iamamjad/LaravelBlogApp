<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title'=>$this->faker->sentence(),
        'tag'=>'Education,Technology,Current Affairs',
        'description'=>$this->faker->paragraph(5),
    ];
});
