<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferencia_paquete', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conferencia_id');
            $table->foreign('conferencia_id')->references('id')->on('conferencias');  
            $table->unsignedBigInteger('paquete_id');
            $table->foreign('paquete_id')->references('id')->on('paquetes');  
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
        Schema::dropIfExists('conferencia_paquete');
    }
};
