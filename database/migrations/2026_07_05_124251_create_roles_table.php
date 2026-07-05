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
        Schema::create('roles', function (Blueprint $table) {

            $table->id();
            /**
             * System identifier
             * Example: admin, teacher, student, parent
             */
            $table->string('name');

            /**
             * Unique slug for system usage
             */
            $table->string('slug', 50)->unique();

            /**
             * Display name for UI
             */
            $table->string('display_name')->nullable();

            /**
             * Optional description
             */
            $table->string('description')->nullable();

            /**
             * Role level defines where this role belongs:
             * 1 = system-wide role (global)
             * 2 = institute-level role
             * 3 = branch-level role
             */
            $table->unsignedTinyInteger('level')->index();
            $table->unsignedTinyInteger('color')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
