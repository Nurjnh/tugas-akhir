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
        Schema::create('aset', function (Blueprint $table) {
           $table->uuid('aset_id')->primary();
           $table->text('no_surat_pengada')->nullable();
           $table->date('tanggal_surat_pengada')->nullable();
           $table->text('nip_pejabat_pengada')->nullable();
           $table->text('nama_pejabat_pengada')->nullable();
           $table->text('jabatan_pejabat_pengada')->nullable();
           $table->text('nama_vendor')->nullable();
           $table->text('jabatan_vendor')->nullable();
           $table->text('akta_notaris_nomor')->nullable();
           $table->text('tanggal_akta')->nullable();
           $table->text('notaris')->nullable();
           $table->text('nama_perusahaan')->nullable();
           $table->integer('flag_erase')->default(1);
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
