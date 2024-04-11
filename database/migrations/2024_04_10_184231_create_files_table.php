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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('url_host')->nullable();
            $table->string('size_file')->nullable();
            $table->string('password_file')->nullable();
            $table->integer('like_count')->default(0);
            $table->integer('download_count')->default(0);
            $table->foreignId('sheet_id')->constrained('sheets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
