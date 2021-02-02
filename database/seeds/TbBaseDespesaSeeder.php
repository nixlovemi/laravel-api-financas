<?php
use Illuminate\Database\Seeder;

class TbBaseDespesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TbBaseDespesa::class, 20)->create();
    }
}