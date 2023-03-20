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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->enum('status', ['standard', 'on_sale'])->default('standard');
            $table->enum('published', ['published', 'not_published'])->default('published');
            $table->string('reference',16);
            $table->string('image')->nullable();
            $table->string('sizes')->nullable();
            $table->unsignedBigInteger('category_id')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
