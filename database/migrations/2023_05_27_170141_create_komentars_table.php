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
        Schema::create('komentars', function (Blueprint $table) {
            $table->id('id_komentar');
            $table->foreignId('id_user');
            $table->foreignId('id_surat');
            $table->longText('komentar');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('no action');
            $table->foreign('id_surat')->references('id_surat')->on('surats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
