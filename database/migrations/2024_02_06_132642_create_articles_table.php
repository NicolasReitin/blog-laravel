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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('media');
            $table->boolean('draft')->nullable();
            $table->boolean('is_approved');
            $table->timestamps();
            $table->foreignId(column: 'categorie_id')->nullable()->constrained(table: 'categories');
            $table->foreignId(column: 'user_id')->constrained(table: 'users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
