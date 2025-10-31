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
            $table->id('id_laporan');
            $table->integer('id_user')->constraint('users', 'id')->onDelete('cascade');
            $table->string('judul_laporan');
            $table->text('isi_laporan');
            $table->string('foto_bukti')->nullable();
            $table->enum('status', ['pending', 'progress', 'completed'])->default('pending');
            $table->date('tanggal_laporan')->default(now());
            $table->date('bulan_laporan')->nullable();
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
