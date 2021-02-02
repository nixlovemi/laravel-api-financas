<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TbLancamento;
use Faker\Generator as Faker;
use App\Models\TbBaseDespesa;
use App\Models\TbConta;

$factory->define(TbLancamento::class, function (Faker $faker) {
    return [
        "lan_despesa"    => ucfirst($faker->words(3, true)),
        "lan_tipo"       => $faker->randomElement(['R', 'D', 'T']),
        "lan_parcela"    => NULL,
        "lan_compra"     => $faker->date(),
        "lan_vencimento" => $faker->date(),
        "lan_valor"      => $faker->randomFloat(2),
        "lan_categoria"  => function() {
            return TbBaseDespesa::all()->random();
        },
        "lan_pagamento"  => $faker->date(),
        "lan_valor_pago" => $faker->randomFloat(2),
        "lan_conta"      => function() {
            return TbConta::all()->random();
        },
        "lan_observacao" => ucfirst($faker->sentence()),
        "lan_confirmado" => $faker->randomElement([0, 1]),
    ];
});
