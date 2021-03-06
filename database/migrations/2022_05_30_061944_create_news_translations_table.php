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
        Schema::create('news_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();

             // Foreign key to the main model
             $table->unsignedBigInteger('news_id');
             $table->unique(['news_id', 'locale']);
             $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');

             // Actual fields I want to translate
             $table->text('title')->nullable();
             $table->text('description')->nullable();
            
             $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_translations');
    }
};
