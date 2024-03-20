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
        Schema::create('detail_pembelian_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembelian_barang_id')->constrained();
            $table->foreignId('barang_id')->constrained();
            $table->string('merk');
            $table->bigInteger('qty');
            $table->string('uom');
            $table->bigInteger('harga');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelian_barangs');
    }
};
