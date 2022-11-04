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
        Schema::create('cupos', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->nullable()->default("");
            $table->string('nombres')->nullable()->default("");
            $table->string('apellidos')->nullable()->default("");
            $table->string('carrera')->nullable()->default("");
            $table->string('foto')->nullable()->default("avatar.png");
            $table->string('celular')->nullable()->default("");
            $table->string('direccion')->nullable()->default("");
            $table->string('correo')->nullable()->default("");
            $table->string('codigo')->nullable()->default("");
            $table->boolean('credencial')->nullable()->default(false);
            $table->boolean('folder')->nullable()->default(false);
            $table->boolean('barbijo')->nullable()->default(false);
            $table->boolean('certificado')->nullable()->default(false);
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
        Schema::dropIfExists('cupos');
    }
};
