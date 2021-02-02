<?php
# https://laravel.com/docs/8.x/migrations#available-column-types

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTbLancamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function(){
            Schema::create('tb_lancamento', function (Blueprint $table) {
                $table->bigIncrements('lan_id');
                $table->string('lan_despesa', 60);
                $table->enum('lan_tipo', ['R', 'D', 'T']);
                $table->string('lan_parcela', 12)->nullable();
                $table->date('lan_compra')->nullable();
                $table->date('lan_vencimento');
                $table->double('lan_valor', 18, 2);
                $table->bigInteger('lan_categoria');
                $table->date('lan_pagamento')->nullable();
                $table->double('lan_valor_pago', 18, 2)->nullable();
                $table->bigInteger('lan_conta')->nullable();
                $table->text('lan_observacao')->nullable();
                $table->tinyInteger('lan_confirmado')->default(0);
            });

            // TODO Financas: create FK

            DB::statement('
                ALTER TABLE tb_lancamento ADD CONSTRAINT chk_tb_lancamento_lan_confirmado CHECK (lan_confirmado = 0 OR lan_confirmado = 1);
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
        Schema::dropIfExists('tb_lancamento');
    }
}
