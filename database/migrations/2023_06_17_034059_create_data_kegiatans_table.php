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
        Schema::create('data_kegiatans', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('data_kehadiran_id')->constrained('data_kehadirans')->onUpdate('cascade')->onDelete('cascade');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kegiatans');
    }
};
