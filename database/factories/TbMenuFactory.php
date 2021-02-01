<?php
# https://laravel.com/docs/8.x/database-testing
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TbMenu;
use Faker\Generator as Faker;

$factory->define(TbMenu::class, function (Faker $faker) {
    // TODO Financas: create menus linked to controller/action

    return [
        "men_descricao"  => 'Início',
        "men_controller" => 'Start',
        "men_action"     => 'index',
        "men_vars"       => NULL,
        "men_id_pai"     => NULL,
        "men_ativo"      => 1,
        "men_icon"       => '<i class="icon icon-home"></i>',
        "men_order"      => 1,
    ];
});
