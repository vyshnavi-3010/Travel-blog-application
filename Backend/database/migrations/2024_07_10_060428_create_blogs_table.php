<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('banner', 2000)->nullable();
            $table->string('thumbnail', 2000)->nullable();
            $table->string('short_description', 2000)->nullable();
            $table->longText('description')->nullable();
            $table->enum('status', ['Show', 'Hide'])->nullable()->default('Show');
            $table->enum('is_feature', ['Yes', 'No'])->nullable()->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
