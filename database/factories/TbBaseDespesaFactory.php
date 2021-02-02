<?php
# https://github.com/fzaninotto/Faker#basic-usage
# https://laravel.com/docs/8.x/database-testing
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TbBaseDespesa;
use Faker\Generator as Faker;

$factory->define(TbBaseDespesa::class, function (Faker $faker) {
    return [
        "bdp_descricao"   => ucfirst($faker->word),
        "bdp_tipo"        => $faker->randomElement(['I', 'F', 'V']),
        "bdp_contabiliza" => 1,
        "bdp_ativo"       => 1,
    ];
});
