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
        Schema::create('rekenings', function (Blueprint $table) {
            $table->id();
            $table->integer('no_rek');
            $table->foreignId('id_nasabah');
            $table->foreignId('id_jenis_tabungan');
            $table->boolean('status');
            $table->date('tgl_aktif');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekenings');
    }
};
