<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_tema_noticia', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedSmallInteger('temaId');
            $table->unsignedInteger('noticiaId');
            $table->timestamps();

            $table->foreign('temaId')->references('id')->on('tb_tema')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('noticiaId')->references('id')->on('tb_noticia')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tema_noticia');
    }
};
