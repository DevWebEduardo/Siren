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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user');
            $table->string('slug');
            $table->string('title')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('description')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('site');
            $table->string('tel');
            $table->string('email');
            $table->foreignId('location'); //Okinawa Location
            $table->foreignId('ad_type');  //Ad Type
            $table->foreignId('pro_type'); //Propertie Type
            $table->foreignId('pri_type'); //Price Time Type
            $table->decimal('price', 10, 2);
            $table->json('images');        // Max 6 Images
            $table->tinyInteger('active')->default(0);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
