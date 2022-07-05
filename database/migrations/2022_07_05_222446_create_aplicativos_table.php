<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAplicativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicativos', function (Blueprint $table) {
            $table->id();
            $table->string('nm_nome_aplicativo', 100);
            $table->string('ds_descricao_aplicativo', 255);
            $table->string('ds_link_aplicativo', 255);
            $table->char('tp_status',3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aplicativos');
    }
}
