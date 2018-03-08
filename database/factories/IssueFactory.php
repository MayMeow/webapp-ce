<?php

use Faker\Generator as Faker;

$factory->define(App\Issue::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'project_id' => function () {
            return factory('App\Project')->create()->id;
        },
        'milestone_id' => function () {
            return factory('App\Milestone')->create()->id;
        },
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'complete' => false
    ];
});
