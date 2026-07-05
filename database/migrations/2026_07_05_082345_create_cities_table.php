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
        Schema::create('cities', function (Blueprint $table) {

            $table->id();

            $table->foreignId('province_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('name', 40);

            $table->string('slug', 40);

            $table->boolean('is_active')->default(true);

            $table->unsignedTinyInteger('sort_order')->default(0);

            $table->timestamps();

            $table->unique(['province_id', 'slug'], 'cities_province_slug_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
