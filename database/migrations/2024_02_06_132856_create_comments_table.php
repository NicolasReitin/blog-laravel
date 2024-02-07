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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreignId(column: 'user_id')->constrained(table: 'users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId(column: 'atricle_id')->constrained(table: 'articles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
