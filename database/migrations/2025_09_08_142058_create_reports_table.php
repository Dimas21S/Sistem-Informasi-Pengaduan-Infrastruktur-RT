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
        Schema::create('reports', function (Blueprint $table) {
            $table->id('id laporan');
            $table->integer('id user')->constraint('users', 'id')->onDelete('cascade');
            $table->string('judul laporan');
            $table->text('isi laporan');
            $table->string('foto bukti')->nullable();
            $table->enum('status', ['pending', 'progress', 'completed'])->default('pending');
            $table->date('tanggal laporan')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
