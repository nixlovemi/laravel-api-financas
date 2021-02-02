<?php
use Illuminate\Database\Seeder;

class TbLancamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TbLancamento::class, 40)->create([
            "lan_pagamento"  => NULL,
            "lan_valor_pago" => NULL,
            "lan_conta"      => NULL,
        ]);
        factory(App\Models\TbLancamento::class, 40)->create();
    }
}