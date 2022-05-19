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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('departamento',100);
            $table->string('municipio',100);
            $table->string('genero',100);
            $table->string('tipo_documento',100);
            $table->integer('num_documento');
            $table->string('nombre_1',100);
            $table->string('nombre_2',100);
            $table->string('apellido_1',100);
            $table->string('apellido_2',100);
            $table->integer('stock');
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
        Schema::dropIfExists('articulos');
    }
};
