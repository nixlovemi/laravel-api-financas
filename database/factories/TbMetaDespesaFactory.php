<?php
# https://github.com/fzaninotto/Faker#basic-usage
# https://laravel.com/docs/8.x/database-testing
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TbMetaDespesa;
use Faker\Generator as Faker;
use App\Models\TbBaseDespesa;

$factory->define(TbMetaDespesa::class, function (Faker $faker) {
    return [
        "mdp_despesa" => function() {
            return TbBaseDespesa::all()->random();
        },
        "mdp_mes"     => $faker->month(),
        "mdp_ano"     => $faker->year(),
        "mdp_valor"   => $faker->randomFloat(2),
    ];
});
