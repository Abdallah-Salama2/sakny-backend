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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('by_agent_id')->nullable()->constrained('agents')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('city');
            $table->string('address');
            $table->decimal('latitude', 10, 7)->nullable(); // Precision for latitude (max 90)
            $table->decimal('longitude', 10, 7)->nullable(); // Precision for longitude (max 180)
            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('baths');
            $table->unsignedSmallInteger('area');
            $table->date('property_date');
            $table->decimal('price', 10, 2);
            $table->string('status');
            $table->string('type');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
