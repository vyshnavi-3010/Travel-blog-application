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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('city_id')->nullable();
            $table->string('logo')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('site_name')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('desgination')->nullable();
            $table->string('experience')->nullable();
            $table->string('admin_logo')->nullable();
            $table->string('image')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('customer_care_no')->nullable();
            $table->string('help_line_no')->nullable();
            $table->string('gst')->nullable();
            $table->double('delivery_charge', 8, 2)->nullable();
            $table->string('company')->nullable();
            $table->string('no_of_services')->nullable();
            $table->string('site_url')->nullable();
            $table->string('android_url')->nullable();
            $table->string('ios_url')->nullable();
            $table->string('customer_app_url')->nullable();
            $table->string('store_app_url')->nullable();
            $table->string('franchise_app_url')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
