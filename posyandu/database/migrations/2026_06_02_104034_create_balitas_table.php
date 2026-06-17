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
    Schema::create('balitas', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->date('tgl_lahir');
        $table->integer('umur')->nullable();
        $table->string('jk');
        $table->string('orang_tua');
        $table->float('berat'); // kg
        $table->float('tinggi'); // cm
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balitas');
    }
};
