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
        Schema::create('produk', function (Blueprint $table) {
            $table->string('kode_produk', 12)->unique();
            $table->string('nama_produk', 30);
            $table->decimal('harga_beli', 10, 2);
            $table->decimal('harga_jual', 10, 2);
            $table->enum('status_produk', ['tunai', 'kredit', 'konsinyasi']);
            $table->unsignedBigInteger('kelompok_produk_id');
            $table->foreign('kelompok_produk_id')->references('id')->on('kelompok_produk');
            $table->integer('stok')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
