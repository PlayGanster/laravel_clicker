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
        Schema::create('gamers', function (Blueprint $table) {
            $table->id(); 
            $table->integer("id_tg");
            $table->integer("amount"); 
            $table->integer("energy"); 
            $table->integer("energy_hour");
            $table->text("refs"); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gamers');
    }
};
