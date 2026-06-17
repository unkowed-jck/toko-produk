<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimoni', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('asal')->nullable();
            $table->text('komentar');
            $table->integer('rating')->default(5);
            $table->string('foto')->nullable();
            $table->string('video')->nullable();
            $table->enum('tipe_media', ['foto', 'video', 'none'])->default('none');
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimoni');
    }
};