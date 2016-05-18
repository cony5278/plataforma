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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Publicacion::class, function (Faker\Generator $faker) {
    return [
        'descripcion_publicacion' => $faker->streetName,
        'fecha_hora_publicacion' => $faker->dateTime,
    ];
});
$factory->define(App\Documento::class, function (Faker\Generator $faker) {
    return [
        'nombre_persona' => $faker->streetName,
        'apellido_persona' => $faker->dateTime,
        'tipo_documento'=>enum('tipo_documento',['tarjeta_credito','tarjeta_debito','carnet_estudiantil',
            'carnet_eps','libreta_militar','pasaporte','visa','tarjeta_profesional','pase','licencia_conduccion','otro']),
        'user_id'=>'',
        'publicacion_id'=>'',
    ];
});

$factory->define(App\Imagen::class, function (Faker\Generator $faker) {
    return [
        'nombre_imagen' => $faker->streetName,
        'user_id' => $faker->dateTime,
        'documento_id'=>'',
    ];
});
