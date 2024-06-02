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
        Schema::create('rapats', function (Blueprint $table) {
            $table->id();
            $table->string('agenda');
            $table->string('waktu');
            $table->string('tanggal');
            $table->string('tempat');
            $table->string('acara');
            $table->string('dihadiri');
            $table->string('dipimpin');
            $table->string('opsi')->nullable()->default('menunggu konfirmasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapats');
    }
};
