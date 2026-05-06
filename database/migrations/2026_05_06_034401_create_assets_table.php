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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();

            $table->string('kode_asset');
            $table->string('nama_perangkat');
            $table->string('jenis_perangkat');
            $table->string('versi_perangkat')->nullable();
            $table->string('pengguna')->nullable();
            $table->string('departemen')->nullable();
            $table->date('tanggal_beli')->nullable();
            $table->decimal('harga', 15, 2)->nullable();
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
