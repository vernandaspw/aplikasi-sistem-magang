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
        Schema::create('data_pembimbings', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20)->nullable();
            $table->foreignId('pembimbing_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('no_hp', 17)->nullable();
            $table->enum('jk', ['l', 'p']);
            $table->text('alamat', 17)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pembimbings');
    }
};
