<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');

            $table->text('extract')->nullable();
            $table->longText('contenido')->nullable();
            $table->string('imagen');

            $table->enum('status', [1, 2])->default(1);
            $table->string('relevancia');
            $table->string('slug');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categoria_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

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
        Schema::dropIfExists('anuncios');
    }
}
