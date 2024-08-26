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
        Schema::create('total_populations', function (Blueprint $table) {
            $table->id();
            $table->integer('j0_12b');
            $table->integer('j1_5t');
            $table->integer('j6_14t');
            $table->integer('j15_25t');
            $table->integer('j26_55t');
            $table->integer('jp55t');
            $table->integer('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_populations');
    }
};
