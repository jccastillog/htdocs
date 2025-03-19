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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('type_legal_id', 5);
            $table->string('legal_id', 50);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 50);
            $table->string('address', 255);
            $table->json('social_media')->nullable();
            $table->boolean('status')->default(true);
            $table->decimal('score', 5, 2)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
