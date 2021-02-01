<?php
use Illuminate\Database\Seeder;

class TbMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TbMenu::class, 1)->create();
    }
}