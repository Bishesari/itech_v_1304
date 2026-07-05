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
        Schema::create('contact_profile', function (Blueprint $table) {
            $table->id();

            /**
             * Contact reference (shared entity)
             */
            $table->foreignId('contact_id')->constrained()->cascadeOnDelete();

            /**
             * Profile owner of this contact relation
             */
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();

            /**
             * Role of this contact for this profile
             * Example: self, parent, emergency
             */
            $table->unsignedTinyInteger('role')->default(1);

            /**
             * Whether this contact is primary for this profile
             */
            $table->boolean('is_primary')->default(false);

            $table->timestamps();

            $table->unique(['contact_id', 'profile_id', 'role']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_profile');
    }
};
