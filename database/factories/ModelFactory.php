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

use App\Models\Grupo;

$factory->define(App\Models\Usuario::class, function (Faker\Generator $faker) {
    return [
        'numeroDocumento' => $faker->numberBetween($min=1000000000, $max=9999999999),
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'email' => $faker->safeEmail,
        'tipoDocumento' => $faker->randomElement(['CC','TI']),
        'fechaNacimiento' => $faker->date(),
        'activo' => random_int(0,1),
        'contrasena' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'genero' => $faker->randomElement(['Masculino', 'Femenino']),
        'telefono' => $faker->e164PhoneNumber,
        'grupo_codigoGrupo' => 0,
        'institucion_codigoInstitucion' => 0,
        'tipoUsuario_codigoTipoUsuario' => $faker->randomElement([1, 2, 3])

    ];
});
