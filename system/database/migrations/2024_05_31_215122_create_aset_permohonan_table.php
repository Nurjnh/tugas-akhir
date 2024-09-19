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
        Schema::create('aset_permohonan', function (Blueprint $table) {
            $table->id('aset_permohonan_id');
            $table->text('nama_barang');
            $table->text('qty_barang');
            $table->text('deskripsi_barang');
            $table->text('author_id');
            $table->text('bidang_id');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_permohonan');
    }
};
