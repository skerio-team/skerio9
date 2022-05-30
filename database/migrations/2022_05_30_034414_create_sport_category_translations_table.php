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
        Schema::create('sport_category_translations', function (Blueprint $table) {
            $table->id();

            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('sport_category_id');
            $table->unique(['sport_category_id', 'locale']);
            $table->foreign('sport_category_id')->references('id')->on('sport_categories')->onDelete('cascade');

            // Actual fields I want to translate
            $table->text('name')->nullable();
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
        Schema::dropIfExists('sport_category_translations');
    }
};
