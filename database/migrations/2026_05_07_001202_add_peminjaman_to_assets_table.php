<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('assets', function (Blueprint $table) {

            $table->string('dipinjam_ke')->nullable();

            $table->date('tanggal_pinjam')->nullable();

            $table->date('tanggal_kembali')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {

            $table->dropColumn([
                'dipinjam_ke',
                'tanggal_pinjam',
                'tanggal_kembali'
            ]);

        });
    }
};