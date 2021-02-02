<?php
# https://github.com/fzaninotto/Faker#basic-usage
# https://laravel.com/docs/8.x/database-testing
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TbConta;
use Faker\Generator as Faker;

$factory->define(TbConta::class, function (Faker $faker) {
    return [
        "con_nome"          => strtoupper($faker->word),
        "con_sigla"         => strtoupper($faker->unique()->lexify('????')),
        "con_data_saldo"    => $faker->dateTimeBetween('-1 years', '-1 day'),
        "con_saldo_inicial" => 0.00,
        "con_ativo"         => 1,
    ];
});
