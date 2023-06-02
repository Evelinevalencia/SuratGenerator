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
        Schema::create('surats', function (Blueprint $table) {
            $table->id('id_surat');
            $table->foreignId('id_template');
            $table->string('nama_penerima');
            $table->string('nama_surat');
            $table->enum('jenis_surat', ['EDARAN', 'PERMOHONAN', 'DINAS', 'TUGAS']);
            $table->string('email');
            $table->longText('isi_surat');
            $table->enum('status_surat', ['menunggu approval', 'diterima', 'ditolak',])->default('menunggu approval');
            $table->foreign('id_template')->references('id_template')->on('templates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
