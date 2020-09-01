<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChambreFoyer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('foyer_id')->unsigned();
            $table->LongText('image')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type', ['Individual','Double', 'For Three'])->default('Individual');
            $table->boolean('tv')->default(0);
            $table->boolean('wc')->default(0);
            $table->boolean('wifi')->default(0);
            $table->boolean('kitchenette')->default(0);
            $table->double('price')->default(100);
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->foreign('foyer_id')->references('id')->on('foyer_responsables')->onDelete('cascade');
            $table->boolean('is_published')->default(0);
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
        Schema::dropIfExists('rooms');
    }
}
