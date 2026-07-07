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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            // Identity
            $table->unsignedTinyInteger('identifier_type')
                ->default(IdentifierType::NationalId->value)
                ->comment('1: National ID, 2: Foreigner ID, 3: Passport');

            $table->string('identifier_number', 30)->unique();

            // Persian Name
            $table->string('first_name_fa', 40);
            $table->string('last_name_fa', 50);

            // English Name
            $table->string('first_name_en', 40)->nullable();
            $table->string('last_name_en', 50)->nullable();

            // Other Names
            $table->string('nickname', 30)->nullable();
            $table->string('father_name', 40)->nullable();

            // Birth Information
            $table->date('birth_date')->nullable();
            $table->foreignId('birth_province_id')->nullable()->constrained('provinces');
            $table->foreignId('birth_city_id')->nullable()->constrained('cities');

            // Personal
            $table->unsignedTinyInteger('gender')->nullable();

            $table->string('religion', 30)->nullable();
            $table->string('religious_denomination', 30)->nullable();

            // Family
            $table->unsignedTinyInteger('marital_status')->nullable();
            $table->unsignedTinyInteger('children_count')->unsigned()->default(0);

            // Military Service
            $table->unsignedTinyInteger('military_status')->nullable();

            // Education
            $table->unsignedTinyInteger('education_level')->nullable();
            $table->string('field_of_study', 50)->nullable();

            // Address
            $table->foreignId('province_id')->nullable()->constrained();
            $table->foreignId('city_id')->nullable()->constrained();

            $table->string('address', 250)->nullable();
            $table->string('postal_code', 10)->nullable();

            // Avatar
            $table->string('avatar')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['identifier_type', 'identifier_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
