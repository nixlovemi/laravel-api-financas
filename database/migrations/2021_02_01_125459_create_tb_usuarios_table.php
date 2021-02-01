<?php
# https://laravel.com/docs/8.x/migrations#available-column-types

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTbUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function(){
            Schema::create('tb_usuario', function (Blueprint $table)
            {
                $table->bigIncrements('usu_id');
                $table->string('usu_login', 40)->unique();
                $table->string('usu_senha', 40);
                $table->string('usu_nome', 50)->nullable();
                $table->string('usu_sobrenome', 50)->nullable();
                $table->string('usu_email', 100)->nullable();
                $table->tinyInteger('usu_ativo')->default(1);
                $table->tinyInteger('usu_superuser')->default(0);
            });

            DB::statement('
                ALTER TABLE tb_usuario ADD CONSTRAINT chk_tb_usuario_usu_ativo CHECK (usu_ativo = 0 OR usu_ativo = 1);
            ');
            DB::statement('
                ALTER TABLE tb_usuario ADD CONSTRAINT chk_tb_usuario_usu_superuser CHECK (usu_superuser = 0 OR usu_superuser = 1);
            ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_usuario');
    }
}
