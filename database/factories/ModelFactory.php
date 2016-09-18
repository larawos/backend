<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User\User::class, function (Faker\Generator $faker) {
    return [
        'name'       => $faker->name,
        'email'      => $faker->safeEmail,
        'password'   => bcrypt('123456'),
        'api_token'  => api_token(),
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
    ];
});

$factory->define(App\Models\Article\Article::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'thumb' => $faker->imageUrl(),
        'content' => $faker->text(3000),
    ];
});

$factory->define(App\Models\Course\Course::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'thumb' => $faker->imageUrl(),
        'description' => $faker->text(),
    ];
});

$factory->define(App\Models\Course\CourseVideo::class, function (Faker\Generator $faker) {
    return [
        'course_id' => mt_rand(1, 500),
        'name' => $faker->sentence,
        'file_token' => str_random(60)
    ];
});