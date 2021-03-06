<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Following::class, function (Faker $faker) {
    return [
        "user_id" => function() {
            return factory(User::class)->create()->id;
        },
        "following_user_id" => function() {
            return factory(User::class)->create()->id;
        }
    ];
});
