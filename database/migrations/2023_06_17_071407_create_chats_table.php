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
        Schema::create('chats', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('data_magang_id')->constrained('data_magangs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pengirim_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('pesan')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
