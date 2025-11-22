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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_proyek');
            $table->text('deskripsi')->nullable();
            $table->string('keahlian')->nullable(); // keahlian yg dipakai projek
            $table->string('pdf_file')->nullable();// Untuk menyimpan path file PDF
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
        Schema::table('portfolios', function (Blueprint $table) {
        $table->dropColumn('pdf_file'); // Menghapus kolom pdf_file jika rollback
    });
    }
};
