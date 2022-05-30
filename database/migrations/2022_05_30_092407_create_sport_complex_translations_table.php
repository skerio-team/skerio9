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
        Schema::create('sport_complex_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            // Foreign key to the main model
            $table->unsignedBigInteger('sport_complex_id');
            $table->unique(['sport_complex_id', 'locale']);
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('sport_complex_translations');
    }
};
