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
        Schema::create('data_penilaians', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('data_magang_id')->constrained('data_magangs')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('nilai_kehadiran', 5,2)->default(0);
            $table->decimal('nilai_disiplin', 5,2)->default(0);
            $table->decimal('nilai_produktivitas_kerja', 5,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penilaians');
    }
};
