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
        Schema::create('aset_unit', function (Blueprint $table) {
            $table->uuid('aset_unit_id')->primary();
            $table->text('aset_id')->nullable();
            $table->text('bidang_id')->nullable();
            $table->text('unit_pemegang')->nullable();
            $table->integer('unit_keadaan')->nullable();
            $table->text('unit_kode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_unit');
    }
};
