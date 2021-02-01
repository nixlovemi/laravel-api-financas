<?php
# https://laravel.com/docs/8.x/database-testing
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TbUsuario;
use Faker\Generator as Faker;

$factory->define(TbUsuario::class, function (Faker $faker) {
    return [
        "usu_login"     => $faker->unique()->userName,
        "usu_senha"     => TbUsuario::encryptPassword('verdaumsdrobs'),
        "usu_nome"      => $faker->firstName(),
        "usu_sobrenome" => $faker->lastName(),
        "usu_email"     => $faker->unique()->userName . '@gmail.com',
        "usu_ativo"     => 1,
        "usu_superuser" => 0,
    ];
});
