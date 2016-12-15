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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $faker = Faker\Factory::create('es_ES');  //inicializamos Faker en modo Español
    return [
        'first_name' => $faker->firstName($gender = null|'male'|'female'),
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'twitter' => $faker->unique()->word,
        'role' => $faker->randomElement(['user','editor','admin']),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Vehicle::class, function (Faker\Generator $faker) {
    static $brandi;

    $faker = new Faker\Generator();
    $faker->addProvider(new Faker\Provider\Brand($faker));
    $faker->addProvider(new Faker\Provider\ModelVehicle($faker));
    $brandi = $faker->brand;
    
    return [
        'brand'     => $brandi,
        'model'     => $faker->modelveh($brandi),
    ];
});
