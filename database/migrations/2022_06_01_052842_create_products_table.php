<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sport_category_id')->nullable();
            $table->foreignId('team_id')->nullable();
            $table->foreignId('product_category_id')->nullable();
            $table->foreignId('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('discount')->default(0);
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->string('like')->nullable();
            $table->string('sale_number')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};