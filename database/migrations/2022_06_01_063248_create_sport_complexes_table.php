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
        Schema::create('sport_complexes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sport_category_id')->constrained('sport_categories')->onDelete('restrict');
            $table->foreignId('area_id')->constrained('areas')->onDelete('restrict');
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->bigInteger('price');
            $table->string('phone');
            $table->string('address');
            $table->string('location');
            $table->tinyInteger('working_status');
            $table->tinyInteger('dress_room');
            $table->tinyInteger('food');
            $table->tinyInteger('bath_room');
            $table->tinyInteger('sit_place');
            $table->string('meta_tag')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('sport_complexes');
    }
};
