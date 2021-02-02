<?php
# https://laravel.com/docs/8.x/migrations#available-column-types

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTbMetaDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function(){
            Schema::create('tb_meta_despesa', function (Blueprint $table) {
                $table->bigIncrements('mdp_id');
                $table->bigInteger('mdp_despesa');
                $table->char('mdp_mes', 2);
                $table->char('mdp_ano', 4);
                $table->double('mdp_valor', 12, 2);

                // TODO Financas: create FK
                /*$table->foreign('mdp_despesa')
                        ->references('bdp_id')
                        ->on('tb_base_despesa')
                        ->onUpdate('cascade')
                        ->onDelete('restrict');*/
            });

            DB::statement('
                ALTER TABLE `tb_meta_despesa` ADD UNIQUE KEY `idx_despesa_mes_ano` (`mdp_despesa`,`mdp_mes`,`mdp_ano`);
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
        Schema::dropIfExists('tb_meta_despesa');
    }
}
