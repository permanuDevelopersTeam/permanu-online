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
        Schema::create('potentials', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->text('image');
            $table->string('title');
            $table->text('excerpt');
            $table->text('body');
            $table->foreignUuid('typePotentialUuid')->references('uuid')->on('type_potentials')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potentials');
    }
};
