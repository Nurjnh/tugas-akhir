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
        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->text('akun_nama')->nullable();
            $table->text('nip')->nullable();
            $table->text('jabatan')->nullable();
            $table->text('akun_bidang_id')->nullable();
            $table->text('email')->nullable();
            $table->text('password')->nullable();
            $table->text('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
