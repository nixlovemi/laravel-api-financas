<?php

use App\Models\TbConta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TbBaseDespesaSeeder::class,
            TbUsuarioSeeder::class,
            TbMenuSeeder::class,
            TbContaSeeder::class,
            TbMetaDespesaSeeder::class,
            TbLancamentoSeeder::class,
        ]);
    }
}
