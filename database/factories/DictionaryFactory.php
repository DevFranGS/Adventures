<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dictionary;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Dictionary::class, function (Faker $faker) {
    $r4 = Str::random(4);
    $r5 = Str::random(5);
    return [
        'term' => $r4,
        'language' => $r5,
        'translate_id' => 1,
        //
    ];
});
