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
        Schema::create('data_pesertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_hp', 17);
            $table->enum('jk', ['l', 'p']);
            $table->longText('alamat')->nullable();
            $table->text('asal_instansi')->nullable();
            $table->text('jurusan')->nullable();
            $table->text('konsentrasi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pesertas');
    }
};
