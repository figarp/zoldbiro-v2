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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Szolgáltatás neve
            $table->text('description'); // Hosszabb leírás
            $table->text('price'); // Árat szövegesen tároljuk
            $table->string('image_url')->nullable(); // Opcionális kép URL
            $table->boolean('visible')->default(true); // Láthatóság
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};