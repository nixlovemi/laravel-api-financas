<?php
# https://laravel.com/docs/8.x/migrations#available-column-types

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTbContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function(){
            Schema::create('tb_conta', function (Blueprint $table) {
                $table->bigIncrements('con_id');
                $table->string('con_nome', 50);
                $table->string('con_sigla', 4)->unique();
                $table->date('con_data_saldo')->default(date('Y-m-d'));
                $table->double('con_saldo_inicial', 12, 2)->default(0.00);
                $table->tinyInteger('con_ativo')->default(1);
            });

            DB::statement('
                ALTER TABLE tb_conta ADD CONSTRAINT chk_tb_conta_con_ativo CHECK (con_ativo = 0 OR con_ativo = 1);
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
        Schema::dropIfExists('tb_conta');
    }
}
