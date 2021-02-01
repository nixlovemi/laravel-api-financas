<?php
use Illuminate\Database\Seeder;

class TbUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TbUsuario::class, 1)->create([
            "usu_login" => "admin"
        ]);
        factory(App\Models\TbUsuario::class, 9)->create();
    }
}