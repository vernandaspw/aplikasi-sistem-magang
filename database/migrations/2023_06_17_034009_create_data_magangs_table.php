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
        Schema::create('data_magangs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignId('peserta_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pembimbing_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('diterima_oleh_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('posisi_id')->nullable()->constrained('posisis')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('bagian_id')->nullable()->constrained('bagians')->onUpdate('cascade')->onDelete('set null');

            $table->timestamp('tanggal_daftar');
            $table->date('magang_mulai')->nullable();
            $table->date('magang_selesai')->nullable();
            $table->enum('status', ['pengajuan', 'magang', 'alumni', 'gagal', 'ditolak']);
            $table->longText('catatan_peserta')->nullable();
            $table->longText('catatan_pembimbing')->nullable();
            $table->longText('keterangan')->nullable();
            $table->string('surat_pengantar', 80)->nullable();
            $table->string('surat_balasan', 80)->nullable();
            $table->string('sertifikat', 80)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_magangs');
    }
};
