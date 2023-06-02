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
        Schema::create('ttds', function (Blueprint $table) {
            $table->id('id_ttd');
            $table->string('ttders');
            $table->foreignId('id_surat');
            $table->string('path_img');
            $table->foreign('id_surat')->references('id_surat')->on('surats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttds');
    }
};
