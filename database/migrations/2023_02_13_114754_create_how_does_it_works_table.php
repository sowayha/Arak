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
        Schema::create('how_does_it_works', function (Blueprint $table) {
            $table->id();
            $table->string('tab1')->nullable();
            $table->text('tab2')->nullable();
            $table->text('tab3')->nullable();
            $table->string('tab11')->nullable();
            $table->text('tab12')->nullable();
            $table->text('tab13')->nullable();
            $table->string('tab14')->nullable();
            $table->text('tab21')->nullable();
            $table->text('tab22')->nullable();
            $table->string('tab23')->nullable();
            $table->text('tab24')->nullable();
            $table->text('tab31')->nullable();
            $table->string('tab32')->nullable();
            $table->text('tab33')->nullable();
            $table->text('tab34')->nullable();
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
        Schema::dropIfExists('how_does_it_works');
    }
};
