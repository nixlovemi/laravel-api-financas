<?php
# https://laravel.com/docs/8.x/migrations#available-column-types

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTbMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function(){
            Schema::create('tb_menu', function (Blueprint $table) {
                $table->bigIncrements('men_id');
                $table->string('men_descricao', 35);
                $table->string('men_controller', 50);
                $table->string('men_action', 50);
                $table->string('men_vars', 50)->nullable();
                $table->bigInteger('men_id_pai')->nullable();
                $table->tinyInteger('men_ativo')->default(1);
                $table->string('men_icon', 50)->nullable();
                $table->mediumInteger('men_order')->default(1);
            });

            DB::statement('
                ALTER TABLE tb_menu ADD CONSTRAINT chk_tb_menu_men_ativo CHECK (men_ativo = 0 OR men_ativo = 1);
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
        Schema::dropIfExists('tb_menu');
    }
}
