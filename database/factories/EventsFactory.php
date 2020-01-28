<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\User;
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

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence(),
        'freemium' => $faker->boolean(40),
        'createdBy' => factory(User::class)->create()->id,
        'activeDate' => $faker->dateTime(),
    ];
});
