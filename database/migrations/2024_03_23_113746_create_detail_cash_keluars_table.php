<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_cash_keluars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kas_keluar_id')->constrained();
            $table->string('deskripsi');
            $table->decimal('harga', 14, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_cash_keluars');
    }
};
