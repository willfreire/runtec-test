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
        Schema::create('tb_noticia', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('titulo', 250)->notNullable();
            $table->text('assunto')->notNullable();
            $table->string('autor')->notNullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_noticia');
    }
};
