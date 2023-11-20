<?php

use Illuminate\Database\Eloquent\Relations\HasOne;
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
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('hp');
            $table->string('jenis');
            $table->date('tgl_daftar');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabahs');
    }

   
};
