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
        Schema::create('contacts', function (Blueprint $table) {

            $table->id();

            /**
             * Contact type stored as TINYINT (mapped via ContactType enum class)
             * Examples:
             * 1 = mobile
             * 2 = phone
             * 3 = email
             * 4 = whatsapp
             * 5 = telegram
             */
            $table->unsignedTinyInteger('type');

            /**
             * Actual contact value
             * Examples:
             * - phone number
             * - email address
             * - username (for telegram, etc.)
             */
            $table->string('value', 150);

            /**
             * Optional label for user-defined naming
             * Example: "father number", "work email"
             */
            $table->string('label', 20)->nullable();

            /**
             * Whether this contact has been verified (OTP/email verification/etc.)
             */
            $table->boolean('is_verified')->default(false);

            /**
             * Soft activation flag (can be disabled without deleting record)
             */
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            /**
             * Prevent duplicate contact entries of same type + value
             */
            $table->unique(['type', 'value']);

            /**
             * Indexing for faster filtering by type
             */
            $table->index('type');

            /**
             * Indexing for active contact queries
             */
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
