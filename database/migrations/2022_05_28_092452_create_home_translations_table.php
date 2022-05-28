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
        Schema::create('home_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('home_id');
            $table->unique(['home_id', 'locale']);
            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');

            // Actual fields I want to translate
            $table->text('title')->nullable();
            $table->text('description')->nullable();



        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_translations');
    }
};
