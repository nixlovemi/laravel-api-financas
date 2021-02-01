<?php
use Illuminate\Database\Seeder;

class TbContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TbConta::class, 3)->create();
    }
}