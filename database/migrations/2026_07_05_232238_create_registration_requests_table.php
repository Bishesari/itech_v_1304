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
        Schema::create('registration_requests', function (Blueprint $table) {

            $table->id();

            $table->ulid('public_id')->unique();

            $table->string('national_code', 10)->index();

            $table->string('first_name', 30);

            $table->string('last_name', 50);

            $table->string('mobile', 20)->index();

            $table->string('status', 20)->index();

            $table->timestamp('verified_at')->nullable();

            $table->timestamp('expires_at');

            $table->ipAddress('ip');

            $table->string('user_agent', 500)->nullable();

            $table->timestamps();
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
