<?php
use Illuminate\Database\Seeder;

class TbMetaDespesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TbMetaDespesa::class, 40)->create();
    }
}