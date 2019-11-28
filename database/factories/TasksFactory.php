<?php

use Faker\Generator as Faker;

$factory->define(\App\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->text,
        'description' => $faker->text,
        'remember' => $faker->date,
        'finished' => $faker->dateTimeBetween('this week', '+6 days')
    ];
});
