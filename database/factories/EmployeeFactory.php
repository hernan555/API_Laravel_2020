<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'puesto' => $faker->jobTitle,
        'descripcion' => $faker->text,
        'sueldo' => $faker->numberBetween(25000,30000),
    ];
});
