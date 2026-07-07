<?php

use App\Enums\IdentifierType;
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
        Schema::create('registration_requests', function (Blueprint $table) {

            $table->id();

            /**
             * Public ULID exposed to clients.
             * Used instead of the internal auto-increment ID in URLs, APIs and logs.
             */
            $table->ulid('public_id')->unique();

            // Identity
            $table->unsignedTinyInteger('identifier_type')
                ->default(IdentifierType::NationalId->value)
                ->comment('1: National ID, 2: Foreigner ID, 3: Passport');

            $table->string('identifier_number', 30);

            $table->string('first_name', 30);

            $table->string('last_name', 50);
            $table->unsignedTinyInteger('contact_type');
            $table->string('contact_value', 150);


            $table->string('status', 20)->index();

            $table->timestamp('verified_at')->nullable();

            $table->timestamp('expires_at')->nullable();

            $table->ipAddress('ip');

            $table->string('user_agent', 500)->nullable();

            $table->timestamps();
            $table->index([
                'identifier_type',
                'identifier_number',
            ]);

            $table->index([
                'contact_type',
                'contact_value',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_requests');
    }
};
