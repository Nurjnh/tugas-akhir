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
        Schema::create('admin', function (Blueprint $table) {
            $table->id('admin_id');
            $table->text('nama')->nullable();
            $table->text('email')->nullable();
            $table->text('nip')->nullable();
            $table->text('jabatan')->nullable();
            $table->text('akun_bidang_id')->nullable();
            $table->text('password');
            $table->text('level');//1 admin 2 kabid
            $table->text('no_telp')->nullable();
            $table->text('foto')->nullable();
            $table->text('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
