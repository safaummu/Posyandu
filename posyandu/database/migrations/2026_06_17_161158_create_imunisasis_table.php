<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('imunisasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_balita'); // Kita pakai nama ini!
            $table->string('nama_orang_tua');
            $table->string('jenis_vaksin');
            $table->date('tanggal_rencana');
            $table->string('status')->default('⏳ Menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imunisasis');
    }
};