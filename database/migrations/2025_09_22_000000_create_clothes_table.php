<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clothes', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('type'); // Ex: Camiseta, Calça, Jaqueta
            $table->string('size'); // Ex: P, M, G, GG
            $table->string('color');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clothes');
    }
};