<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->uuid('karyawan_uuid');
            $table->foreign('karyawan_uuid')->references('uuid')->on('karyawan')->onDelete('cascade');
            $table->integer('amanah')->default(0);
            $table->integer('kompeten')->default(0);
            $table->integer('harmonis')->default(0);
            $table->integer('loyal')->default(0);
            $table->integer('adaptif')->default(0);
            $table->integer('rata')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
