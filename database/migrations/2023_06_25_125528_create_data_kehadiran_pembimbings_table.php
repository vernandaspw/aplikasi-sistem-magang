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
        Schema::create('data_kehadiran_pembimbings', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignId('pembimbing_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->enum('status_kehadiran', ['setengah hari', 'hadir','tidak hadir']);
            $table->enum('status', ['pending', 'disetujui', 'ditolak']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kehadiran_pembimbings');
    }
};
