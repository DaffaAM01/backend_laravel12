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
        Schema::create('suplayer', function (Blueprint $table) {
            $table->id();
            $table->string('nama_suplayer');
            $table->string('nama_perusahaan');
            $table->text('alamat',20);
            $table->string('noHP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suplayer');
    }
};
