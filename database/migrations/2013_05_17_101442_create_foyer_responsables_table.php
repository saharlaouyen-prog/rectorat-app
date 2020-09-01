<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoyerResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foyer_responsables', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->integer('is_active')->default(0);
            $table->string('image')->default('default.jpg');
            $table->string('gouver')->nullable();
            $table->text('address')->nullable();
            $table->string('name_res', 100)->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
            $table->integer('capacity')->default(0);
            $table->string('email')->unique();
            $table->string('password',255);
            $table->string('avatar')->default('default.jpg');
            $table->boolean('is_public')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('foyer_responsables');
    }
}
