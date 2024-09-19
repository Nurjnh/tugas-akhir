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
        Schema::create('aset_detail', function (Blueprint $table) {
           $table->uuid('aset_detail_id')->primary();
           $table->text('aset_id')->nullable();
           $table->text('aset_kategori_id')->nullable();
           $table->text('aset_bidang_id')->nullable();
           $table->text('aset_nama')->nullable();
           $table->text('aset_qty')->nullable();
           $table->text('aset_harga')->nullable();
           $table->text('aset_tanggal_masuk')->nullable();
           $table->text('aset_foto')->nullable();
           $table->text('aset_deskripsi')->nullable();
           $table->integer('flag_erase')->default(1);
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_detail');
    }
};
