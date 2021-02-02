<?php
# https://laravel.com/docs/8.x/migrations#available-column-types

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTbBaseDespesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function(){
            Schema::create('tb_base_despesa', function (Blueprint $table) {
                $table->bigIncrements('bdp_id');
                $table->string('bdp_descricao', 50)->unique();
                $table->enum('bdp_tipo', ['I', 'F', 'V']);
                $table->tinyInteger('bdp_contabiliza')->default(1);
                $table->tinyInteger('bdp_ativo')->default(1);
            });

            DB::statement('
                ALTER TABLE tb_base_despesa ADD CONSTRAINT chk_tb_base_despesa_bdp_contabiliza CHECK (bdp_contabiliza = 0 OR bdp_contabiliza = 1);
            ');
            DB::statement('
                ALTER TABLE tb_base_despesa ADD CONSTRAINT chk_tb_base_despesa_bdp_ativo CHECK (bdp_ativo = 0 OR bdp_ativo = 1);
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
        Schema::dropIfExists('tb_base_despesa');
    }
}
