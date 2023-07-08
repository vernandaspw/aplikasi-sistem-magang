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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi',50);
            $table->longText('deskripsi_instansi')->nullable();
            $table->longText('alamat_instansi')->nullable();
            $table->text('email')->nullable();
            $table->text('wa')->nullable();
            $table->text('ig')->nullable();
            $table->text('twitter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
